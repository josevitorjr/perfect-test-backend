(function (win, doc) {
    'use strict';
    function confirmDelete(event) {
        event.preventDefault();
        //console.log(event.target.href);
        let token = doc.getElementsByName("_token")[0].value;
        if (confirm("Deseja mesmo apagar?")) {
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE", event.target.href);
            ajax.setRequestHeader('X-CSRF-TOKEN', token);
            ajax.onreadystatechange = function () {
                if (ajax.readyState === 4 && ajax.status === 200) {
                    win.location.href = '/#products';
                }
            };
            ajax.send();
        } else {
            return false
        }
    }
    if (doc.querySelector('.delete')) {
        let btn = doc.querySelectorAll('.delete')
        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDelete, false);
        }
    }

})(window, document);