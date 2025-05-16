const dropdownButton = document.getElementById('dropdownButtonOptionforComment');
const dropdownMenu = document.getElementById('dropdownMenuOptionforComment');

const dropdownButtonMovies = document.getElementById('dropdownButtonOptionforMovies');
const dropdownMenuMovies = document.getElementById('dropdownMenuOptionforMovies');

const dropdownButtonYears = document.getElementById('dropdownButtonOptionforYears');
const dropdownMenuYears = document.getElementById('dropdownMenuOptionforYears');

if(dropdownButton)
  {dropdownButton.addEventListener('click', () => {
  dropdownMenu.classList.toggle('hidden');
});}


window.addEventListener('click', (e) => {
  if (dropdownButton && dropdownMenuMovies && !dropdownButton.contains(e.target) && !dropdownMenuMovies.contains(e.target)) {
    dropdownMenuMovies.classList.add('hidden');
  }
});

//

if(dropdownButtonMovies)
  {dropdownButtonMovies.addEventListener('click', () => {
    dropdownMenuMovies.classList.toggle('hidden');
});}


window.addEventListener('click', (e) => {
  if (dropdownButtonMovies && dropdownMenuMovies && !dropdownButtonMovies.contains(e.target) && !dropdownMenuMovies.contains(e.target)) {
    dropdownMenuMovies.classList.add('hidden');
  }
});

//
if(dropdownButtonYears)
  {dropdownButtonYears.addEventListener('click', () => {
    dropdownMenuYears.classList.toggle('hidden');
});}


window.addEventListener('click', (e) => {
  if (dropdownButtonYears && dropdownMenuYears && !dropdownButtonYears.contains(e.target) && !dropdownMenuYears.contains(e.target)) {
    dropdownMenuYears.classList.add('hidden');
  }
});