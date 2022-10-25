//валидация загрузки картинок в форме и превью загруженного изображения
const formImage = document.getElementById('formImage');
const formPreview = document.getElementById('formPreview');

if (formImage && formPreview) {
	formImage.addEventListener('change', () => {
		uploadFile(formImage.files[0])
	});

	function uploadFile(file) {
		if (!['image/jpeg', 'image/jpg', 'image/png', 'image/webp', 'image/gif'].includes(file.type)) {
			alert('Ошибка. Разрешены только изображения');
			formImage.value = '';
			return
		}
		if (file.size > 10 * 1024 * 1024) {
			alert('Ошибка. Файл должен быть не более 10 Мб');
			return
		}

		var reader = new FileReader();
		reader.onload = function (e) {
			formPreview.innerHTML = `<img src="${e.target.result}" alt = "превью улучшения от пользователя">`;
		};
		reader.onerror = function (e) {
			alert('ошибка. С загруженным файлом что-то не так. Попробуйте загрузить еще раз.');
		}
		reader.readAsDataURL(file);
	}
}