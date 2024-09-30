# Code Beautifier

A simple web-based code beautifier tool that formats and indents HTML, CSS, and JavaScript code for better readability. This project consists of a frontend interface and a PHP backend to handle the code beautification process.

## Features

- **Beautify Code**: Automatically formats HTML, CSS, and JavaScript code with proper indentation and removes unnecessary empty lines.
- **Clear Input**: Allows the user to clear the input and output fields with a button click.
- **Copy Code**: The beautified code can be easily copied to the clipboard with a single button press.

## Files

### 1. `index.html`

The main frontend interface allows users to input their code, beautify it, and view the result.

- **Textarea for input**: Where users paste or type their code.
- **Beautify button**: Calls the backend to process and format the code.
- **Clear button**: Clears both the input and the result fields.
- **Copy button**: Copies the beautified code to the clipboard.

### 2. `beautify.php`

The backend PHP file processes the code to apply beautification. It uses logic to properly indent HTML, CSS, and JavaScript while removing unnecessary spaces and lines.

- Handles both HTML elements, `<style>`, and `<script>` tags.
- Reduces indentation levels after closing tags or braces.
- Returns the beautified code as JSON.

### 3. `script.js`

This JavaScript file handles the frontend operations, including sending AJAX requests to the PHP backend and managing the interface.

- **`beautifyCode()`**: Sends the input code to `beautify.php` via a `POST` request and displays the beautified result.
- **`clearResult()`**: Clears the code input and hides the output section.
- **`copyCode()`**: Copies the beautified code to the clipboard for easy use.

## How to Use

1. Clone or download the repository.
2. Ensure you have a PHP server (like XAMPP or WAMP).
3. Open `index.html` in a browser.
4. Paste or type the code you want to beautify in the input text area.
5. Press the "Beautify Code" button to format your code.
6. Copy the beautified code using the "Copy Code" button.
7. Clear the fields if needed using the "Clear Result" button.

## Dependencies

- [Bootstrap 5.3.0](https://getbootstrap.com/) for styling and responsiveness.

## Acknowledgements

- [Bootstrap](https://getbootstrap.com/) for frontend styling.
- [PHP](https://www.php.net/) for backend processing.
- [JavaScript Fetch API](https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API) for handling asynchronous requests.


![Screenshot (41)](https://github.com/user-attachments/assets/7ef92871-77f9-431a-a753-966cca2a0e1c)


![Screenshot (40)](https://github.com/user-attachments/assets/a16deff1-410b-43c3-a63f-0cd1ea0c73ed)



