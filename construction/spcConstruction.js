document.getElementById("dd").innerHTML = dateYear();

function dateYear() {
    const exxp = new Date();
    const exxe = exxp.getFullYear();
    return exxe;
};

