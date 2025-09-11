export function contactFrom() {
    window.addEventListener('DOMContentLoaded', function () {
        const required = document.querySelectorAll('.wpcf7-validates-as-required');
        let requiredArray = {};
        const submit = document.querySelector('.wpcf7-submit');
        const attention = document.querySelector('.wpcf7-required-attention');

        if (required.length > 0) {
            submit.disabled = true;
            if (attention) {
                attention.classList.add('active');
            }
            required.forEach((el) => {
                if (el.value === '') {
                    requiredArray[el.name] = false;
                }
                el.addEventListener('input', () => {
                    if (el.value === '') {
                        requiredArray[el.name] = false;
                    } else if (requiredArray[el.name] === false) {
                        delete requiredArray[el.name];
                    }
                    if (Object.keys(requiredArray).length === 0) {
                        submit.disabled = false;
                        if (attention) {
                            attention.classList.remove('active');
                        }
                    } else {
                        submit.disabled = true;
                        if (attention) {
                            attention.classList.add('active');
                        }
                    }
                });
            });
        }
    });
};
