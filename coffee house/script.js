const nums = document.querySelectorAll('.nums span');
const counter = document.querySelector('.counter');
const finalMessage = document.querySelector('.final');
const replay = document.querySelector('#replay');

// Run the initial animation

window.addEventListener("scroll", () => {
  const navbar = document.querySelector(".navbar");
  if (window.scrollY > 50) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
});

// Swiper Initialization for Landing Page
const swiper = new Swiper('.swiper', {
  loop: true,
  autoplay: {
    delay: 3000, // 3 seconds delay
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  effect: 'fade', // Smooth fade effect
});


runAnimation();

function resetDOM() {
  counter.classList.remove('hide');
  finalMessage.classList.remove('show');

  nums.forEach((num) => {
    num.classList.remove('in', 'out');
  });

  nums[0].classList.add('in');
}

function runAnimation() {
  nums.forEach((num, idx) => {
    const nextToLast = nums.length - 1;

    num.addEventListener('animationend', (e) => {
      if (e.animationName === 'goIn' && idx !== nextToLast) {
        num.classList.remove('in');
        num.classList.add('out');
      } else if (e.animationName === 'goOut' && num.nextElementSibling) {
        num.nextElementSibling.classList.add('in');
      } else {
        counter.classList.add('hide');
        finalMessage.classList.add('show');
      }
    });
  });
}

replay.addEventListener('click', () => {
  resetDOM();
  runAnimation();
});




// const nums = document.querySelectorAll('.nums span')
// const counter = document.querySelector('.counter')
// const finalMessage = document.querySelector('.final')
// const replay = document.querySelector('#replay')

// runAnimation()

// function resetDOM() {
//   counter.classList.remove('hide')
//   finalMessage.classList.remove('show')

//   nums.forEach((num) => {
//     num.classList.value = ''
//   })

//   nums[0].classList.add('in')
// }

// function runAnimation() {
//   nums.forEach((num, idx) => {
//     const nextToLast = nums.length - 1

//     num.addEventListener('animationend', (e) => {
//       if (e.animationName === 'goIn' && idx !== nextToLast) {
//         num.classList.remove('in')
//         num.classList.add('out')
//       } else if (e.animationName === 'goOut' && num.nextElementSibling) {
//         num.nextElementSibling.classList.add('in')
//       } else {
//         counter.classList.add('hide')
//         finalMessage.classList.add('show')
//       }
//     })
//   })
// }

// replay.addEventListener('click', () => {
//   resetDOM()
//   runAnimation()
// })




// // Select all icon wrappers
// const iconWrappers = document.querySelectorAll('.icon-wrapper');

// // Add hover effect using JavaScript (optional since CSS handles most of it)
// iconWrappers.forEach((wrapper) => {
//   const iconBg = wrapper.querySelector('.icon-bg');
//   const icon = wrapper.querySelector('i');

//   wrapper.addEventListener('mouseenter', () => {
//     // Change background color and rotate
//     iconBg.style.backgroundColor = '#c49b63';
//     iconBg.style.transform = 'rotateZ(135deg)';

//     // Adjust icon text stroke
//     icon.style.webkitTextStroke = '0.2rem #2a2727';
//   });

//   wrapper.addEventListener('mouseleave', () => {
//     // Reset background and rotation
//     iconBg.style.backgroundColor = '';
//     iconBg.style.transform = '';

//     // Reset icon text stroke
//     icon.style.webkitTextStroke = '0.2rem #c49b63';
//   });
// });

// // Add dynamic content updates (example: incrementing number)
// const dataNumbers = document.querySelectorAll('.num');
// dataNumbers.forEach((num) => {
//   let count = 0;

//   setInterval(() => {
//     count++;
//     num.textContent = count;
//   }, 1000); // Increment every second
// });
