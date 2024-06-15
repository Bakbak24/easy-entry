document.addEventListener('DOMContentLoaded', function() {
    let questionMark = document.querySelector('.fa-solid');
    let infoBubble = document.querySelector('.info-bubble');

    questionMark.addEventListener('click', function() {
      infoBubble.classList.toggle('active');
      if (infoBubble.classList.contains('active')) {
        infoBubble.style.display = 'block';
      } else {
        infoBubble.style.display = 'none';
      }
    });
    questionMark.addEventListener('mouseover', function() {
      infoBubble.style.display = 'block';
    });

    questionMark.addEventListener('mouseout', function() {
      infoBubble.style.display = 'none';
    });
  });