function beautifyCode() {
const code = document.getElementById('codeInput').value;
if (code.trim() === '') {
alert('Please enter some code to beautify.');
return;
}
fetch('beautify.php', {
method: 'POST',
headers: {
'Content-Type': 'application/x-www-form-urlencoded',
},
body: `code=${encodeURIComponent(code)}`
})
.then(response => response.json())
.then(data => {
if (data.error) {
throw new Error(data.error);
}
document.getElementById('beautifiedCode').value = data.beautified;
document.getElementById('beautifiedCodeSection').style.display = 'block';
})
.catch(error => {
console.error('Error:', error);
alert('An error occurred while beautifying the code: ' + error.message);
});
}
function clearResult() {
document.getElementById('codeInput').value = '';
document.getElementById('beautifiedCode').value = '';
document.getElementById('beautifiedCodeSection').style.display = 'none'; // Hide the beautified code section again
}
function copyCode() {
const beautifiedCode = document.getElementById('beautifiedCode');
if (beautifiedCode.value.trim() === '') {
alert('There is no code to copy.');
return;
}
beautifiedCode.select();
document.execCommand('copy');
alert('Beautified code copied to clipboard!');
}