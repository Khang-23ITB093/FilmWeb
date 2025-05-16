import "choices.js/public/assets/styles/choices.css";
import './choicesjs'
document.addEventListener("DOMContentLoaded", () => {
    const ratingContainer = document.getElementById("rating-container");
    const stars = document.querySelectorAll(".rating-star");
    const ratingDisplay = document.querySelector(".rating-display");
    const changeDisplay = document.querySelector(".change-display");
    const changeButton = document.getElementById("changeRating-button");
    const cancelButton = document.getElementById("cancelRating-button");

    let selectedRating = 0;

    // Hiệu ứng hover ngôi sao
    const handleHover = (hoverIndex) => {
        stars.forEach((star, index) => {
            star.src = index <= hoverIndex
                ? star.dataset.activeSrc
                : star.dataset.inactiveSrc;
        });
    };

    // Reset hiển thị ngôi sao khi hover rời đi
    const resetStars = () => {
        stars.forEach((star, index) => {
            star.src = index < selectedRating
                ? star.dataset.activeSrc
                : star.dataset.inactiveSrc;
        });
    };

    // Xử lý hover vào từng ngôi sao
    stars.forEach((star, index) => {
        star.parentElement.addEventListener("mouseover", () => handleHover(index));
        star.parentElement.addEventListener("mouseleave", resetStars);

        // Xử lý khi người dùng click để chọn số sao
        star.parentElement.addEventListener("click", () => {
            selectedRating = index + 1;

            // Gửi đánh giá qua Livewire

            // Hiển thị giao diện mới
            if (ratingDisplay) ratingDisplay.classList.remove("hidden");
            if (ratingContainer) ratingContainer.classList.add("hidden");
            if (changeDisplay) changeDisplay.classList.add("hidden");
        });
    });

    // Nút Change
    if (changeButton) {
        changeButton.addEventListener("click", () => {
            selectedRating = 0;

            // Hiển thị lại các ngôi sao để chọn mới
            if (ratingContainer) ratingContainer.classList.remove("hidden");
            if (ratingDisplay) ratingDisplay.classList.add("hidden");
            if (changeDisplay) changeDisplay.classList.remove("hidden");
        });
    }

    // Nút Cancel
    if (cancelButton) {
        cancelButton.addEventListener("click", () => {
            // Ẩn giao diện Change
            if (changeDisplay) changeDisplay.classList.add("hidden");
            if (ratingDisplay) ratingDisplay.classList.remove("hidden");
            if (ratingContainer) ratingContainer.classList.add("hidden");
        });
    }
})

document.addEventListener("DOMContentLoaded", () => {
    const heart = document.getElementById('follow-heart');
    heart.addEventListener('click', function () {
        heart.src = heart.src.includes('heart-fill')
            ? heart.dataset.inactiveSrc
            : heart.dataset.activeSrc;
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const readMoreOpen = document.querySelectorAll('.read-more-open');
    const readMoreClose = document.querySelectorAll('.read-more-close');
    const textContainers = document.querySelectorAll('.text-container');

    readMoreOpen.forEach((button, index) => {
        button.addEventListener('click', () => {
            textContainers[index].style.display = 'block';
            button.style.display = 'none';
            readMoreClose[index].style.display = 'block';
        });
    });

    readMoreClose.forEach((button, index) => {
        button.addEventListener('click', () => {
            textContainers[index].style.display = '-webkit-box';
            button.style.display = 'none';
            readMoreOpen[index].style.display = 'block';
        });
    });
});

//More Hide
document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector('.text-container');
    const paragraph = container.querySelector('p');
    const moreBtn = container.querySelector('.read-more-open');
    const hideBtn = container.querySelector('.read-more-close');

    // Ẩn nút Hide ban đầu
    hideBtn.style.display = 'none';

    // Kiểm tra overflow của đoạn văn
    const isOverflowing = () => paragraph.scrollHeight > paragraph.offsetHeight;

    // Hiển thị nút More nếu đoạn văn bị overflow
    if (isOverflowing()) {
        moreBtn.style.display = 'block';
    } else {
        moreBtn.style.display = 'none';
    }

    // Xử lý sự kiện khi nhấn nút More
    moreBtn.addEventListener('click', () => {
        paragraph.style.display = 'block';
        paragraph.style.webkitLineClamp = 'unset';
        paragraph.style.overflow = 'visible';

        moreBtn.style.display = 'none';
        hideBtn.style.display = 'block';
    });

    // Xử lý sự kiện khi nhấn nút Hide
    hideBtn.addEventListener('click', () => {
        paragraph.style.webkitLineClamp = '3';
        paragraph.style.overflow = 'hidden';
        paragraph.style.display = '-webkit-box';
        moreBtn.style.display = 'block';
        hideBtn.style.display = 'none';
    });
});

