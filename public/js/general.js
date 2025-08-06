// Reading Progress Bar
function updateProgressBar() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrollPercent = (scrollTop / scrollHeight) * 100;
    document.getElementById('reading-progress').style.width = scrollPercent + '%';
}


// Table of Contents Active State
function updateActiveSection() {
    const sections = document.querySelectorAll('section[id]');
    const tocLinks = document.querySelectorAll('.toc-link');

    let currentSection = '';

    sections.forEach(section => {
        const rect = section.getBoundingClientRect();
        if (rect.top <= 100 && rect.bottom >= 100) {
            currentSection = section.getAttribute('id');
        }
    });

    tocLinks.forEach(link => {
        link.classList.remove('bg-blue-100', 'text-blue-600', 'font-semibold');
        if (link.getAttribute('href') === '#' + currentSection) {
            link.classList.add('bg-blue-100', 'text-blue-600', 'font-semibold');
        }
    });
}

// Smooth Scrolling for TOC Links
document.querySelectorAll('.toc-link').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        const targetSection = document.getElementById(targetId);
        if (targetSection) {
            targetSection.scrollIntoView({behavior: 'smooth', block: 'start'});
        }
    });
});

// Mobile TOC Toggle
const tocToggle = document.getElementById('toc-toggle');
const tocSidebar = document.getElementById('toc-sidebar');

tocToggle.addEventListener('click', function () {
    tocSidebar.classList.toggle('-translate-x-full');
});

// Close sidebar when clicking outside on mobile
document.addEventListener('click', function (e) {
    if (window.innerWidth < 1024 && !tocSidebar.contains(e.target) && !tocToggle.contains(e.target)) {
        tocSidebar.classList.add('-translate-x-full');
    }
});

// Event Listeners
window.addEventListener('scroll', () => {
    updateProgressBar();
    updateActiveSection();
});

// Initial calls
updateProgressBar();
updateActiveSection();
