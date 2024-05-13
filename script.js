const loginBtn = document.getElementById('loginBtn');
const display = document.getElementById('display');

function validate() {
  const username = document.getElementById('username').value;
  const pass = document.getElementById('password').value;
  const re_pass = document.getElementById('re-password').value;

  if(username.length < 5) {
    display.innerText = "Too short username.";
    return false;
  }

  if(pass.length < 8) {
    display.innerText = "Password must be at least 8 characters long";
    return false;
  }

  if(pass !== re_pass) {
    display.innerText = "Passwords do not match";
  }

  window.location.href = 'dashboard.html';
  return true;

}
