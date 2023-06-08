const btns = window.document.getElementsByClassName('linkOrder');

const sort = ['title', 'id_dev', 'tag', 'date', 'severity', 'status'];
const dir = ['asc', 'desc', 'asc', 'desc', 'desc', 'asc'];

for (let i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        document.location.href="../pages/admin.php?sort="+sort[i]+"&dir="+dir[i];
    });
}

console.log(btns);