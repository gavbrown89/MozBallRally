function validateNonEmpty(inputField, helpText) {
    if (inputField.value.length == 0) {
        if (helpText != null)
            helpText.innerHTML = "Please enter a value.";
        doSelection(inputField);

        return false;
    }
    else {
        if (helpText != null)
            helpText.innerHTML = "";
        return true;
    }
}