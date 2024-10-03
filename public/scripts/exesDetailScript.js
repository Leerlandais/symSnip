const dtElements = document.querySelectorAll('dt');
const ddElements = document.querySelectorAll('dd');
console.log("exes script ok");
dtElements.forEach(dt => {
    dt.addEventListener('click', function() {
        ddElements.forEach(dd => {
            dd.style.display = 'none';
        });

        dtElements.forEach(dt => {
            dt.classList.remove('active');
        });

        const dd = this.nextElementSibling;
        if (dd.style.display === 'none') {
            this.classList.add('active');
            dd.style.display = 'block';
        }
    });
});