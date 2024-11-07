// script.js
function showMessage() {
    alert("This is part of my job, so It is trivial. I hope I am of any help to you.");
  }
  // script.js

function flipCard(cardContainer) {
    cardContainer.classList.toggle('flip');
  }


// Open the signup modal and fill in class details
// Open the signup modal and fill in class details
function openSignupForm(cell) {
    const row = cell.closest('tr');
    const className = row.getAttribute('data-class');
    const classTime = row.getAttribute('data-time');
    const signupCount = row.querySelector('.signup-count');
  
    // Set class details in the modal
    document.getElementById('class-info').innerText = `Class: ${className} (${classTime})`;
    document.getElementById('signup-modal').style.display = 'flex';
  
    // Store the count element reference for later updates
    document.getElementById('signup-modal').dataset.countElement = signupCount;
}
  
  // Close the signup modal
function closeSignupForm() {
  document.getElementById('signup-modal').style.display = 'none';
}
  
// Handle form submission and update the count
function submitSignupForm(event) {
  event.preventDefault(); // Prevent form from submitting normally

  // Retrieve and update the count element
  const countElement = document.getElementById('signup-modal').dataset.countElement;
  let currentCount = parseInt(countElement.innerText, 10);
  countElement.innerText = currentCount + 1;

  // Reset the form and close the modal
  event.target.reset();
  closeSignupForm();
}
  