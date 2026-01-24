import './bootstrap';


document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.time-input').forEach(input => {

        input.addEventListener('input', e => {
            let v = e.target.value.replace(/\D/g, '');

            if (v.length >= 3) {
                v = v.slice(0, 2) + ':' + v.slice(2, 4);
            }

            e.target.value = v.slice(0, 5);
        });

        input.addEventListener('blur', e => {
            const val = e.target.value;

            // faqat 00:00 – 23:59
            if (val !== '' && !/^([01]\d|2[0-3]):([0-5]\d)$/.test(val)) {
                e.target.value = '';
            }
        });

    });
});
