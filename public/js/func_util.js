function copyText(element)
{
    navigator.clipboard.writeText(element.textContent);
    alert('Tracking number copied!');
}

function changeMainImage(element)
{
    const img = element.firstElementChild;
    const main_img = document.getElementById('main-image');
    main_img.src = img.src;
    main_img.alt = img.alt;
}