function limitToSixDigits(input) {
    if (input.value.length > 6) {
        input.value = input.value.slice(0, 6);
    }
}
