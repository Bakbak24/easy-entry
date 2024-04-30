document.addEventListener("DOMContentLoaded", function() {
  const steps = document.querySelectorAll(".step");

  steps.forEach((step) => {
    step.addEventListener("click", () => {
      const stepsParent = step.parentNode;
      if (stepsParent.classList.contains('steps-right')) {
        const leftColumn = document.querySelector('.steps-left');
        const rightColumn = document.querySelector('.steps-right');
        if (leftColumn.children.length > 0) {
          // Move the step from the left column back to the right column
          rightColumn.appendChild(leftColumn.children[0]);
          // Add class "step-tw" to the moved step
          rightColumn.children[rightColumn.children.length - 1].classList.add('step-tw');
        }
        // Move the clicked step to the left column
        leftColumn.appendChild(step);
        // Remove class "step-tw" from the clicked step
        step.classList.remove('step-tw');
      } else {
        // Move the clicked step after the first child in the right column
        stepsParent.insertBefore(step, stepsParent.childNodes[1]);
        // Add class "step-th" to the clicked step
        step.classList.add('step-th');
      }
    });
  });
});