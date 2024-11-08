function bold() {
	var textarea = document.getElementById('textarea')
	var start = textarea.selectionStart
	var end = textarea.selectionEnd
	var beforeText = textarea.value.substring(0, start)
	var text = textarea.value.substring(start, end)
	var afterText = textarea.value.substring(end, textarea.value.lenght)
	textarea.value = beforeText + "<b>" + text + "</b>" + afterText
}
function italic() {
	var textarea = document.getElementById('textarea')
	var start = textarea.selectionStart
	var end = textarea.selectionEnd
	var beforeText = textarea.value.substring(0, start)
	var text = textarea.value.substring(start, end)
	var afterText = textarea.value.substring(end, textarea.value.lenght)
	textarea.value = beforeText + "<i>" + text + "</i>" + afterText
}
function underline() {
	var textarea = document.getElementById('textarea')
	var start = textarea.selectionStart
	var end = textarea.selectionEnd
	var beforeText = textarea.value.substring(0, start)
	var text = textarea.value.substring(start, end)
	var afterText = textarea.value.substring(end, textarea.value.lenght)
	textarea.value = beforeText + "<u>" + text + "</u>" + afterText
}
function color(color){
	var textarea = document.getElementById('textarea')
	var colors = ['red', 'blue', 'purple', 'green', 'brown']
	var start = textarea.selectionStart
	var end = textarea.selectionEnd
	var beforeText = textarea.value.substring(0, start)
	var text = textarea.value.substring(start, end)
	var afterText = textarea.value.substring(end, textarea.value.lenght)
	textarea.value = beforeText + `<font color="${colors[color]}">` + text + `</font>` + afterText
}