var token_ref = [];
export const setRef = (data) => {
    var boolean = true;
    for (var i = 0; i < token_ref.length; i++) {
        if (token_ref[i] === data) {
            boolean = false;
        }
    }
    if (boolean) {
        token_ref = [...token_ref, data]
    }
}
export const getRef = (id) => {
    for (var i = 0; i < token_ref.length; i++) {
        if (id  == (token_ref[i].current.id + "")) {
            return token_ref[i];
        }
    }
}