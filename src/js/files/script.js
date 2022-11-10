// Подключение функционала "Чертогов Фрилансера"
import { isMobile } from "./functions.js";
// Подключение списка активных модулей
import { flsModules } from "./modules.js";

window.onload = function () {
	// Выделение строк в таблице администратора по клику мышкой
	let elements = Array.from(document.querySelectorAll('.tableNewRequestTable table tr'));
	// console.log(elements);
	// console.log(elemActive.length);

	if (elements) {
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

				// заполнение инпутов данными из таблицы
				// возврат значений из ячеек в таблице
				let
					idTable = elem.querySelector('td:nth-child(1)').innerHTML,
					dateTable = elem.querySelector('td:nth-child(2)').innerHTML,
					categoryTable = elem.querySelector('td:nth-child(3)').innerHTML,
					titleTable = elem.querySelector('td:nth-child(4)').innerHTML,
					discriptTable = elem.querySelector('td:nth-child(5)').innerHTML;

				document.querySelector('#newRequestTitle').value = titleTable;
				document.querySelector('#newRequestDiscription').value = discriptTable;

			}
		}
	}

	//добавление новой категории
	// ...
	document.addEventListener("selectCallback", function (e) {
		const currentSelect = e.detail.select;
		console.log(currentSelect);
	})

}