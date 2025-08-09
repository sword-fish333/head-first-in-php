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

// PHP Playground Modal Functions
function openPhpPlayground(btn) {
    const playground = btn.closest('[data-playground]');
    const codeContent = playground.querySelector('.code-content');
    const modal = document.getElementById('php-playground-modal');
    const modalEditor = document.getElementById('modal-code-editor');
    
    // Get the original code content
    const code = codeContent.textContent.trim();
    
    // Populate the modal editor
    modalEditor.value = code;
    
    // Show the modal
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    
    // Focus on the editor
    setTimeout(() => {
        modalEditor.focus();
        updateLineNumbers();
    }, 100);
}

function closePhpPlayground() {
    const modal = document.getElementById('php-playground-modal');
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
    
    // Reset modal state
    clearModalResults();
    showInitialState();
}

function runModalCode() {
    const modalEditor = document.getElementById('modal-code-editor');
    const runBtn = document.getElementById('modal-run-btn');
    const runIcon = runBtn.querySelector('.material-symbols-outlined');
    const runText = runBtn.querySelector('span:last-child');
    
    // Show loading state
    showLoadingState();
    runIcon.textContent = 'hourglass_empty';
    runText.textContent = 'Running...';
    runBtn.disabled = true;
    runBtn.classList.add('opacity-50');
    
    // Get the code from textarea
    const code = modalEditor.value;
    
    // Send code to server for execution
    fetch('/api/execute-code', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ code: code })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showOutputSection(data.output || '(No output)', data.error);
        } else {
            showErrorSection(data.error || 'Unknown error occurred');
        }
    })
    .catch(error => {
        showErrorSection('Network error: ' + error.message);
    })
    .finally(() => {
        // Reset button state
        runIcon.textContent = 'play_arrow';
        runText.textContent = 'Run Code';
        runBtn.disabled = false;
        runBtn.classList.remove('opacity-50');
    });
}

function showInitialState() {
    document.getElementById('modal-initial-state').classList.remove('hidden');
    document.getElementById('modal-loading-state').classList.add('hidden');
    document.getElementById('modal-output-section').classList.add('hidden');
    document.getElementById('modal-error-section').classList.add('hidden');
}

function showLoadingState() {
    document.getElementById('modal-initial-state').classList.add('hidden');
    document.getElementById('modal-loading-state').classList.remove('hidden');
    document.getElementById('modal-output-section').classList.add('hidden');
    document.getElementById('modal-error-section').classList.add('hidden');
}

function showOutputSection(output, error) {
    document.getElementById('modal-initial-state').classList.add('hidden');
    document.getElementById('modal-loading-state').classList.add('hidden');
    document.getElementById('modal-output-section').classList.remove('hidden');
    document.getElementById('modal-error-section').classList.add('hidden');
    
    document.getElementById('modal-results-output').textContent = output;
    
    if (error) {
        document.getElementById('modal-error-section').classList.remove('hidden');
        document.getElementById('modal-error-output').textContent = error;
    }
}

function showErrorSection(error) {
    document.getElementById('modal-initial-state').classList.add('hidden');
    document.getElementById('modal-loading-state').classList.add('hidden');
    document.getElementById('modal-output-section').classList.add('hidden');
    document.getElementById('modal-error-section').classList.remove('hidden');
    
    document.getElementById('modal-error-output').textContent = error;
}

function clearModalResults() {
    document.getElementById('modal-results-output').textContent = '';
    document.getElementById('modal-error-output').textContent = '';
}

function clearModalEditor() {
    document.getElementById('modal-code-editor').value = '';
    updateLineNumbers();
}

function copyModalCode() {
    const modalEditor = document.getElementById('modal-code-editor');
    const copyBtn = event.target.closest('button');
    
    navigator.clipboard.writeText(modalEditor.value).then(function() {
        // Visual feedback
        copyBtn.innerHTML = '<span class="material-symbols-outlined text-xs">check</span> Copied!';
        copyBtn.classList.add('text-green-600');
        
        setTimeout(() => {
            copyBtn.innerHTML = '<span class="material-symbols-outlined text-xs">content_copy</span> Copy';
            copyBtn.classList.remove('text-green-600');
        }, 1500);
    }).catch(function(err) {
        console.error('Failed to copy text: ', err);
    });
}

function updateLineNumbers() {
    const editor = document.getElementById('modal-code-editor');
    const lineNumbers = document.getElementById('line-numbers');
    const lines = editor.value.split('\n').length;
    
    let numbersHtml = '';
    for (let i = 1; i <= Math.max(lines, 20); i++) {
        numbersHtml += i + '\n';
    }
    lineNumbers.textContent = numbersHtml;
}

function copyCode(btn) {
    const playground = btn.closest('[data-playground]');
    const codeDisplay = playground.querySelector('.code-snippet');
    
    // Copy from code display (always in view mode now)
    const textToCopy = codeDisplay.textContent;
    
    navigator.clipboard.writeText(textToCopy).then(function() {
        // Visual feedback
        const originalText = btn.querySelector('.material-symbols-outlined').textContent;
        btn.querySelector('.material-symbols-outlined').textContent = 'check';
        btn.classList.add('bg-green-600');
        
        setTimeout(() => {
            btn.querySelector('.material-symbols-outlined').textContent = originalText;
            btn.classList.remove('bg-green-600');
        }, 1500);
    }).catch(function(err) {
        console.error('Failed to copy text: ', err);
        
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = textToCopy;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        
        // Visual feedback
        const originalText = btn.querySelector('.material-symbols-outlined').textContent;
        btn.querySelector('.material-symbols-outlined').textContent = 'check';
        btn.classList.add('bg-green-600');
        
        setTimeout(() => {
            btn.querySelector('.material-symbols-outlined').textContent = originalText;
            btn.classList.remove('bg-green-600');
        }, 1500);
    });
}

// Add keyboard shortcuts and event listeners for the modal
document.addEventListener('DOMContentLoaded', function() {
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('php-playground-modal');
            if (modal && !modal.classList.contains('hidden')) {
                closePhpPlayground();
            }
        }
        
        // Run code with Ctrl+Enter
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            const modal = document.getElementById('php-playground-modal');
            if (modal && !modal.classList.contains('hidden')) {
                e.preventDefault();
                runModalCode();
            }
        }
    });
    
    // Update line numbers as user types
    const modalEditor = document.getElementById('modal-code-editor');
    if (modalEditor) {
        modalEditor.addEventListener('input', updateLineNumbers);
        modalEditor.addEventListener('scroll', function() {
            const lineNumbers = document.getElementById('line-numbers');
            lineNumbers.scrollTop = this.scrollTop;
        });
    }
    
    // Close modal when clicking outside
    const modal = document.getElementById('php-playground-modal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closePhpPlayground();
            }
        });
    }
});
