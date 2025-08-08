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
        if (rect.top <= 100 && rect.bottom >= 150) {
            currentSection = section.getAttribute('id');
        }
    });

    tocLinks.forEach(link => {
        link.classList.remove('bg-rose-100', 'text-gray-600', 'font-semibold');
        if (link.getAttribute('href') === '#' + currentSection) {
            link.classList.add('bg-rose-100', 'text-gray-600', 'font-semibold');
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

class TooltipSystem {
    constructor() {
        this.tooltip = document.getElementById('tooltip');
        this.content = this.tooltip.querySelector('.tooltip-content');
        this.arrow = this.tooltip.querySelector('.tooltip-arrow');
        this.init();
    }

    init() {
        document.addEventListener('mouseover', e => {
            if (e.target.closest('.extra-info')) {
                this.show(e.target.closest('.extra-info'), e);
            }
        });

        document.addEventListener('mouseout', e => {
            if (e.target.closest('.extra-info')) {
                this.hide();
            }
        });

        document.addEventListener('mousemove', e => {
            if (e.target.closest('.extra-info')) {
                this.updatePosition(e.target.closest('.extra-info'), e);
            }
        });
    }

    show(element, event) {
        const info = element.dataset.info;
        if (!info) return;

        this.content.textContent = info;
        this.tooltip.classList.add('show');
        this.updatePosition(element, event);
    }

    hide() {
        this.tooltip.classList.remove('show');
    }

    updatePosition(element, event) {
        const rect = element.getBoundingClientRect();
        const tooltipRect = this.tooltip.getBoundingClientRect();

        let top = rect.top - tooltipRect.height - 10;
        let left = rect.left + (rect.width / 2) - (tooltipRect.width / 2);

        // Keep tooltip on screen
        if (left < 10) left = 10;
        if (left + tooltipRect.width > window.innerWidth - 10) {
            left = window.innerWidth - tooltipRect.width - 10;
        }
        if (top < 10) {
            top = rect.bottom + 10;
            this.arrow.style.top = '-4px';
            this.arrow.style.bottom = 'auto';
        } else {
            this.arrow.style.bottom = '-4px';
            this.arrow.style.top = 'auto';
        }

        // Center arrow
        const arrowLeft = rect.left + (rect.width / 2) - left - 4;
        this.arrow.style.left = Math.max(8, Math.min(arrowLeft, tooltipRect.width - 16)) + 'px';

        this.tooltip.style.top = top + 'px';
        this.tooltip.style.left = left + 'px';
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => new TooltipSystem());
