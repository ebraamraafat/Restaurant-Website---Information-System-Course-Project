const headerBackgrounds = [
    "./img/home_bg1.jpg",
    "./img/home_bg2.jpg",
    "./img/home_bg3.jpg",
    "./img/home_bg4.jpg",
    "./img/home_bg5.jpg",
    "./img/home_bg6.jpg",
    "./img/home_bg7.jpg",
    "./img/home_bg8.jpg",
    "./img/home_bg9.jpg"
];

let currentBackgroundIndex = 0;
const headerElement = document.querySelector("header");

// دالة لتغيير الخلفية
function changeHeaderBackground() {
    currentBackgroundIndex = (currentBackgroundIndex + 1) % headerBackgrounds.length;
    headerElement.style.backgroundImage = `url(${headerBackgrounds[currentBackgroundIndex]})`;
}

// تغيير الخلفية كل 5 ثواني
setInterval(changeHeaderBackground, 3000);
/*----------------------------------------------------------------------------------------------------------------------*/

function scrollLeft() {
    console.log("Scroll left button clicked"); // تحقق مما إذا كانت الوظيفة تستدعي
    const container = document.querySelector('.menu-items');
    const scrollAmount = 380; // المسافة التي تريد التمرير بها
    if (container.scrollLeft > 0) {  // تحقق من أنه يمكن التمرير لليسار
        container.scrollBy({
            left: -scrollAmount,
            behavior: 'smooth'
        });
    }
}

function scrollRight() {
    const container = document.querySelector('.menu-items');
    const scrollAmount = 380; // المسافة التي تريد التمرير بها
    container.scrollBy({
        left: scrollAmount,
        behavior: 'smooth'
    });
}

// إضافة أحداث النقر للأزرار
document.querySelector('.scroll-left').addEventListener('click', scrollLeft);
document.querySelector('.scroll-right').addEventListener('click', scrollRight);
/*-------------------------------------------------------------------------------------------------------------------------------------------*/
function scrollLeft2() {
    console.log("Scroll left button clicked"); // تحقق مما إذا كانت الوظيفة تستدعي
    const container = document.querySelector('.menu2-items');
    const scrollAmount = 380; // المسافة التي تريد التمرير بها
    if (container.scrollLeft > 0) {  // تحقق من أنه يمكن التمرير لليسار
        container.scrollBy({
            left: -scrollAmount,
            behavior: 'smooth'
        });
    }
}

function scrollRight2() {
    const container = document.querySelector('.menu2-items');
    const scrollAmount = 380; // المسافة التي تريد التمرير بها
    container.scrollBy({
        left: scrollAmount,
        behavior: 'smooth'
    });
}

// إضافة أحداث النقر للأزرار
document.querySelector('.scroll-left2').addEventListener('click', scrollLeft2);
document.querySelector('.scroll-right2').addEventListener('click', scrollRight2);
/*-------------------------------------------------------------------------------------------------------------------------------------------*/

