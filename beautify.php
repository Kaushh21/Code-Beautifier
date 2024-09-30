<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['code'] ?? '';

    if (empty($code)) {
        echo json_encode(['error' => 'No code provided']);
        exit;
    }

    try {
        $beautified = beautifyCode($code);
        echo json_encode(['beautified' => $beautified]);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}

function beautifyCode($code) {
    $lines = explode("\n", $code);
    $beautified = '';
    $indentLevel = 0;
    $inStyle = false;
    $inScript = false;

    foreach ($lines as $line) {
        $trimmedLine = trim($line);
        if (preg_match('/<style/i', $trimmedLine)) $inStyle = true;
        if (preg_match('/<\/style>/i', $trimmedLine)) $inStyle = false;
        if (preg_match('/<script/i', $trimmedLine)) $inScript = true;
        if (preg_match('/<\/script>/i', $trimmedLine)) $inScript = false;

        if (!$inStyle && !$inScript) {
            if (preg_match('/<\/[^>]+>/', $trimmedLine)) {
                $indentLevel = max(0, $indentLevel - 1);
            }
            $beautified .= str_repeat('    ', $indentLevel) . $trimmedLine . "\n";
            if (preg_match('/<[^\/][^>]*[^\/]>/', $trimmedLine) && !preg_match('/<(input|img|br|hr|meta|link)/i', $trimmedLine)) {
                $indentLevel++;
            }
        }
        elseif ($inStyle) {
            if (preg_match('/}/', $trimmedLine)) {
                $indentLevel = max(0, $indentLevel - 1);
            }
            $beautified .= str_repeat('    ', $indentLevel) . $trimmedLine . "\n";
            if (preg_match('/{/', $trimmedLine)) {
                $indentLevel++;
            }
        }
        elseif ($inScript) {
            if (preg_match('/[)}]/', $trimmedLine)) {
                $indentLevel = max(0, $indentLevel - 1);
            }
            $beautified .= str_repeat('    ', $indentLevel) . $trimmedLine . "\n";
            if (preg_match('/[({]/', $trimmedLine)) {
                $indentLevel++;
            }
        }
    }

    $beautified = preg_replace('/\s+$/m', '', $beautified); // Remove trailing spaces
    $beautified = preg_replace('/^\s+$/m', '', $beautified); // Remove empty lines
    $beautified = preg_replace('/\n{3,}/', "\n\n", $beautified); // Limit consecutive empty lines

    return rtrim($beautified);
}