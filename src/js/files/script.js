// Подключение функционала "Чертогов Фрилансера"
import { isMobile } from "./functions.js";
// Подключение списка активных модулей
import { flsModules } from "./modules.js";

// Выделение строк в таблице администратора по клику мышкой
let elements = Array.from(document.querySelectorAll('.tableNewRequestTable table tr')); // получаю элементы по которым кликать
// console.log(elements);
// console.log(elemActive.length);

// для удаления существующих классов _active
let removeActive = () => {
	let elemActive = Array.from(document.querySelectorAll('._active')); // получаю элементы с классом _active
	for (let elAc of elemActive) {
		elAc.className = '';
	}
}

for (let elem of elements) {
	elem.onclick = () => {
		removeActive();
		elem.classList.toggle('_active');
	}
}




