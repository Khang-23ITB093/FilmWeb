import Choices from "choices.js";
import 'choices.js/public/assets/styles/choices.min.css';
import "choices.js/public/assets/styles/choices.css";
//hidden clear button
document.addEventListener('DOMContentLoaded', function() {
    const genresSelect = document.getElementById('genres');

    genresSelect?.addEventListener('change', function() {
        const selectedOptions = genresSelect.selectedOptions;
        document.getElementById('clear-selection').style.display = selectedOptions.length > 0 ? 'block' : 'none';
    });

    const sortBy = document.getElementById('sortBy');
    sortBy?.addEventListener('change', function() {
        document.getElementById('clear-sort').style.display = sortBy.value ? 'block' : 'none';
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Khởi tạo Choices.js
    const genresSelect = document.getElementById('genres');

    if(!genresSelect) return;

    const choices = new Choices(genresSelect, {
        noChoicesText: 'No genres found',
        noResultsText: 'No results found',
        removeItemButton: true,
        shouldSort: false,
        placeholderValue: 'Select genres',
        searchPlaceholderValue: '',
    });
    const sortBy = document.getElementById('sortBy');

    if(!sortBy) return;

    const choice2 = new Choices(sortBy, {
        searchEnabled: false,
        noChoicesText: 'No option found',
        noResultsText: 'No option found',
        removeItemButton: true,
        shouldSort: false,
        placeholderValue: 'Sort by',
        searchPlaceholderValue: '',
    });

    // Hiển thị dropdown khi click vào container hoặc toggle cho genres
    document.getElementById('genres-container').addEventListener('click', () => choices.showDropdown());
    document.getElementById('toggle-dropdown-genres').addEventListener('click', () => choices.showDropdown());
    // Hiển thị dropdown khi click vào container hoặc toggle cho sortBy
    document.getElementById('sortBy-container').addEventListener('click', () => choice2.showDropdown());
    document.getElementById('toggle-dropdown-sortBy').addEventListener('click', () => choice2.showDropdown());

    document.getElementById('clear-selection').addEventListener('click', () => {
        // Xóa toàn bộ các mục đã chọn
        choices.removeActiveItems();

        // Gửi sự kiện `change` để đồng bộ lại dữ liệu
        const event = new Event('change', { bubbles: true });
        genresSelect.dispatchEvent(event);

        // Làm mới giao diện và placeholder
        choices.clearInput();
        updateChoicesPlaceholder();
    });


    document.getElementById('clear-sort').addEventListener('click', () => {
        // Xóa toàn bộ các mục đã chọn
        choice2.removeActiveItems();

        // Gửi sự kiện `change` để đồng bộ lại dữ liệu
        const event = new Event('change', { bubbles: true });
        sortBy.dispatchEvent(event);

        // Làm mới giao diện và placeholder
        choice2.clearInput();
        updateChoicesPlaceholder();
    });

    // Hàm cập nhật placeholder và ẩn thông báo khi còn lựa chọn
    function updateChoicesPlaceholder() {
        const selectedItems = choices.getValue(true);
        if (selectedItems.length === 0) {
            choices.input.placeholder = 'Select genres';
        } else {
            choices.input.placeholder = '';
        }
        choices.input.setWidth();

        // Kiểm tra xem còn lựa chọn nào chưa được chọn hay không
        const noChoicesElement = choices.passedElement.element.closest('.choices').querySelector('.has-no-choices');
        if (noChoicesElement) {
            noChoicesElement.style.display =  'none';
        }
    }

    // Lắng nghe sự kiện thay đổi trên select để cập nhật placeholder
    genresSelect.addEventListener('change', updateChoicesPlaceholder);

    // Lắng nghe sự kiện khi xóa một mục đã chọn
    genresSelect.addEventListener('removeItem', updateChoicesPlaceholder);

    // Chạy ngay khi load trang
    updateChoicesPlaceholder();
});


// Circle rating
// document.addEventListener("alpine:init", () => {
//     Alpine.data('initRatingCard', () => ({
//         init() {
//             // Khởi tạo tất cả các thẻ .rating-card khi Alpine được tải
//             document.querySelectorAll('.rating-card').forEach(initRatingCard);
//         }
//     }));
// });

window.initRatingCard = function(card) {
    const rating = parseFloat(card.getAttribute("data-rating"));
    const progressBar = card.querySelector(".CircularProgressbar-path");
    const ratingText = card.querySelector(".rating-text");

    const circumference = 2 * Math.PI * 46;
    progressBar.style.strokeDashoffset = ((10 - rating) / 10) * circumference;

    if (rating < 5) {
        progressBar.style.stroke = "red";
    } else if (rating < 7) {
        progressBar.style.stroke = "orange";
    } else {
        progressBar.style.stroke = "green";
    }

    ratingText.textContent = rating;
};


const observer = new MutationObserver(() => {
    document.querySelectorAll('.rating-card').forEach(initRatingCard);
});

observer.observe(document.body, { childList: true, subtree: true });

