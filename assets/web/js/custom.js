const menuToggle = document.querySelector('.menuToggle');
const navigation = document.querySelector('.navigation');
menuToggle.onclick = function () {
	navigation.classList.toggle('open')
}

const list = document.querySelectorAll('.list');

function activeLink() {
	list.forEach((item) =>
		item.classList.remove('active'));
	this.classList.add('active');
}

function removeLink() {
	list.forEach((item) =>
		item.classList.remove('active'));
}

list.forEach((item) => {
	item.addEventListener('mouseover', activeLink);
	item.addEventListener('mouseout', removeLink)
})
  