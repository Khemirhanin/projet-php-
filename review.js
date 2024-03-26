const stars = document.querySelectorAll(".star");
const message = document.getElementById("ratingMessage");

stars.forEach(star => {
  star.addEventListener("click", function() {
    const rating = parseInt(star.getAttribute("data-rating"));
    resetStars();
    markStars(rating);
    // Send the rating data to the server or perform any other necessary action
  });
});

function resetStars() {
  stars.forEach(star => {
    star.classList.remove("active");
  });
}

function markStars(rating) {
  for (let i = 0; i < rating; i++) {
    stars[4-i].classList.add("active");
  }
}