const left = document.querySelector('.left');
const right = document.querySelector('.right');
const container = document.querySelector('.container');

// --------------------
// MOUSE OVER LEFT SIDE
// --------------------

// Add class .hover-left to the .left class
left.addEventListener('mouseenter', () => {
  container.classList.add('hover-left');
});

// Remove class .hover-left from the .left class
left.addEventListener('mouseleave', () => {
  container.classList.remove('hover-left');
});

// ---------------------
// MOUSE OVER RIGHT SIDE
// ---------------------

// Add class .hover-right to the .right class
right.addEventListener('mouseenter', () => {
  container.classList.add('hover-right');
});

// Remove class .hover-right from the .right class
right.addEventListener('mouseleave', () => {
  container.classList.remove('hover-right');
});