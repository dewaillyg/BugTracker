const btns = window.document.getElementsByClassName('linkOrder');

const sort = ['title', 'id_dev', 'tag', 'date', 'severity'];
const dir = ['asc', 'desc', 'asc', 'desc', 'desc'];

for (let i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        document.location.href="../pages/admin.php?sort="+sort[i]+"&dir="+dir[i];
    });
}

console.log(btns);