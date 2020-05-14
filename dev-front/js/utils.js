const serialize = function (form) {
	let arr = [];
	Array.prototype.slice.call(form.elements).forEach(function (field) {
		if (!field.name || field.disabled || ['reset', 'submit', 'button'].indexOf(field.type) > -1) return;
		if (field.type === 'select-multiple') {
			Array.prototype.slice.call(field.options).forEach(function (option) {
				if (!option.selected) return;
				arr.push(encodeURIComponent(field.name) + '=' + encodeURIComponent(option.value));
			});
			return;
		}
		if (['checkbox', 'radio'].indexOf(field.type) >-1 && !field.checked) return;
		arr.push(encodeURIComponent(field.name) + '=' + encodeURIComponent(field.value));
	});
	return arr.join('&');
};

export {
    serialize
}
