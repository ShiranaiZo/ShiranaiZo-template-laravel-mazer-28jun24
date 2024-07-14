function toast(text, type){
    let backgroundColor = '#28ab55';

    if(type === 'error'){
        backgroundColor = '#dc3545';
    }

    Toastify({
        text: text,
        duration: 3000,
        close: true,
        backgroundColor: backgroundColor,
    }).showToast()
}
