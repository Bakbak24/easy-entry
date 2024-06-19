document.addEventListener("DOMContentLoaded", function() {
  const steps = document.querySelectorAll(".step");

  steps.forEach((step) => {
    step.addEventListener("click", () => {
      const stepsParent = step.parentNode;
      if (stepsParent.classList.contains('steps-right')) {
        const leftColumn = document.querySelector('.steps-left');
        const rightColumn = document.querySelector('.steps-right');
        if (leftColumn.children.length > 0) {
          rightColumn.appendChild(leftColumn.children[0]);
          rightColumn.children[rightColumn.children.length - 1].classList.add('step-tw');
        }
        leftColumn.appendChild(step);
        step.classList.remove('step-tw');
      } else {
        stepsParent.insertBefore(step, stepsParent.childNodes[1]);
        step.classList.add('step-th');
      }
    });
  });
});