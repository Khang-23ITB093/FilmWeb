import Swiper from "swiper/bundle";
import "swiper/css/bundle";

const homeSwiper = new Swiper(".home-swiper", {
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
const latestSwiper = new Swiper(".latest-swiper", {
    slidesPerView: 'auto',
    spaceBetween: 40,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next-latest",
        prevEl: ".swiper-button-prev-latest",
    },
    breakpoints: {
        0: {
            spaceBetween: 20,
        },
        920: {
            spaceBetween: 40,
        }
    },
});
const trendingSwiper = new Swiper(".trending-swiper", {
    slidesPerView: 'auto',
    spaceBetween: 40,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next-trending",
        prevEl: ".swiper-button-prev-trending",
    },
    breakpoints: {
        0: {
            spaceBetween: 20,
        },
        920: {
            spaceBetween: 40,
        }
    },
});
const mostWatchedSwiper = new Swiper(".most-watched-swiper", {
    slidesPerView: 'auto',
    speed: 1000,
    loop: false,
    navigation: {
        nextEl: ".swiper-button-next-most-watched",
        prevEl: ".swiper-button-prev-most-watched",
    },
    on: {
        slideChange: function () {
            Livewire.dispatch('setCurrentFilmByIndex', {index: this.realIndex});
        }
    },
});
const moviesSwiper = new Swiper(".movies-swiper", {
    slidesPerView: "auto",
    spaceBetween: 20,
    navigation: {
        nextEl: ".swiper-button-next-movies",
        prevEl: ".swiper-button-prev-movies",
    },
});
const showsSwiper = new Swiper(".shows-swiper", {
    slidesPerView: "auto",
    spaceBetween: 20,
    navigation: {
        nextEl: ".swiper-button-next-shows",
        prevEl: ".swiper-button-prev-shows",
    },
});
const genresSwiper = new Swiper(".genres-swiper", {
    slidesPerView: "auto",
    speed: 1000,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next-genres",
        prevEl: ".swiper-button-prev-genres",
    },
    breakpoints: {
        250: {
            spaceBetween: 20,
            slidesPerView: 2.7
        },
        320: {
            spaceBetween: 20,
            slidesPerView: 3
        },
        375: {
            spaceBetween: 20,
            slidesPerView: 3.5
        },
        425: {
            spaceBetween: 20,
            slidesPerView: 4
        },
        768: {
            spaceBetween: 40,
            slidesPerView: 4.5
        },
        1080: {
            spaceBetween: 40,
            slidesPerView: 4.5
        },
        1920: {
            spaceBetween: 67,
            slidesPerView: 5.2
        }
    },
    on: {
        slideChange: function () {
            Livewire.dispatch('setCurrentFilmByIndexGenres', {index: this.realIndex});
        }
    },
});
function addButtonDelay(buttonClass) {
    const button = document.querySelector(buttonClass);
    if (button) {
        button.addEventListener('click', function () {
            button.disabled = true;
            setTimeout(() => {
                button.disabled = false;
            }, 800);
        });
    }
}

addButtonDelay('.swiper-button-next-most-watched');
addButtonDelay('.swiper-button-prev-most-watched');

const actorSwiper = new Swiper(".actor-swiper", {
    slidesPerView: 'auto',
    spaceBetween: 16,
});

const cartItem = new Swiper(".similarShows-swiper", {
    slidesPerView: "auto",
    spaceBetween: 20,
});
const relativeMovieSwiper = new Swiper(".relative-movie-swiper", {
    slidesPerView: 6,
    spaceBetween: 40,
    loop: false,
    navigation: {
        nextEl: "#relative-movie-swiper-button-next",
        prevEl: "#relative-movie-swiper-button-prev",
    },
    slidesPerGroup: 3,
    breakpoints: {
        320: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        1300: {
            slidesPerView: 5,
            spaceBetween: 15,
        },
        1600: {
            slidesPerView: 6,
            spaceBetween: 20,
        },
        1800: {
            slidesPerView: 7,
            spaceBetween: 20,
        },
    },
});


const seriesSwiper = new Swiper(".series-movie-swiper", {
    slidesPerView: "auto",
    spaceBetween: 20,
    loop: false,
});

let episodeSwiper; // Biến toàn cục lưu trữ Swiper instance
initEpisodeSwiper();

function initEpisodeSwiper() {
    const swiperElement = document.querySelector(".episodes-swiper");
    if (swiperElement) {
        // Hủy Swiper cũ nếu tồn tại
        if (episodeSwiper) {
            episodeSwiper.destroy(true, true);
        }

        // Khởi tạo Swiper mới
        episodeSwiper = new Swiper(swiperElement, {
            slidesPerView: "auto",
            spaceBetween: 20,
            loop: false,
        });

        console.log("Swiper initialized.");
    } else {
        console.warn("Swiper element not found.");
    }
}

// Lắng nghe sự kiện Livewire và sự kiện tùy chỉnh
document.addEventListener("livewire:afterDomUpdate", () => {
    setTimeout(initEpisodeSwiper, 250); // Đồng bộ thời gian chờ
});

document.addEventListener("init-swiper", () => {
    setTimeout(initEpisodeSwiper, 250); // Sử dụng cùng hàm và thời gian chờ
});



