function getUsers() {
    return JSON.parse(localStorage.getItem("users")) || [];

}
function saveUsers(users) { 
    localStorage.setItem("users", JSON.stringify(users));
}
function getBookings() {
  return JSON.parse(localStorage.getItem("bookings")) || [];
}

function saveBookings(bookings) {
  localStorage.setItem("bookings", JSON.stringify(bookings));
}

function getLoggedInUser() {
  return JSON.parse(localStorage.getItem("loggedInUser")) || null;
}
//Registration
function Create(){
const name = document.getElementById("name").value.trim();
const email = document.getElementById("email").value.trim();
const password = document.getElementById("pass").value.trim();
const confirmPassword = document.getElementById("re").value.trim();
const errorMsg = document.getElementById("error-msg");
const successMsg = document.getElementById("success-msg");
//Reset Messages
errorMsg.textContent = "";
successMsg.textContent = "";
    //Validation
if(!name || !email || !password || !confirmPassword){
    errorMsg.textContent = " ⚠️Please fill in all fields.";
    return;
}

if(password.length<6){
    errorMsg.textContent= "⚠️Password must be at least 6 characters.";
    return;
}
 
if(password !== confirmPassword){
    errorMsg.textContent = "⚠️Passwords do not match.";
    return;
}
 //Check if email already exists
const users=getUsers();
const exists=users.find(u=>u.email === email);
if(exists){
    errorMsg.textContent = "⚠️Email is already registered.";
    return;
}
 //Save new Users

   users.push({
    name,
    email,
    password,
    role: "user",
    registeredAt: new Date().toLocaleString()
  });
  saveUsers(users);
  successMsg.textContent = "✅ Account created! Redirecting to login...";
  setTimeout(() => {
    window.location.href = "login.html";
  }, 2000);
  }
  function Login(){
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("pass").value.trim();
    const errorMsg = document.getElementById("error-msg");
    const successMsg = document.getElementById("success-msg");
    //Reset Messages
    errorMsg.textContent = "";
    successMsg.textContent = "";
    //Validation
    if(!email || !password){
        errorMsg.textContent = " ⚠️ Please fill in all fields.";
        return;
    }
    const users=getUsers();
    const user=users.find(u=>u.email === email && u.password === password);
    if(!user){
        errorMsg.textContent = "⚠️ Invalid email or password.";
        return;
    }
    localStorage.setItem("loggedInUser", JSON.stringify(user));

    successMsg.textContent = `✅ Welcome back, ${user.name}! Redirecting...`;
     
      setTimeout(() => {
    if (user.role === "admin") {
      window.location.href = "admin.html";
    } else {
      window.location.href = "index.html";
    }
  }, 3000);
}

