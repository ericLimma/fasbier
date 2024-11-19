document.addEventListener('DOMContentLoaded', function () {

        const div = document.getElementById('map');

        div.addEventListener('click', function () {
                const iframe = document.createElement('iframe');
                iframe.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3679.8746913007885!2d-47.59381432469476!3d-22.73289847937776!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c62fc69f9c4261%3A0x5138882498c15036!2sR.%20Cap.%20Jos%C3%A9%20Pinto%20Siqueira%2C%201701%20-%20Unileste%2C%20Piracicaba%20-%20SP%2C%2013422-150!5e0!3m2!1spt-BR!2sbr!4v1703349015499!5m2!1spt-BR!2sbr";
                iframe.style.width = "100%";
                iframe.style.height = "500px";
                iframe.setAttribute('frameborder', '0');
                iframe.setAttribute('allowfullscreen', '');

                div.appendChild(iframe);

                div.style.display = 'none';
        });
});