


// modal toggle
// *
// *

const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('overlay')

openModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = document.querySelector(button.dataset.modalTarget)
    openModal(modal);

  })
})

overlay.addEventListener('click', () => {
    const modals = document.querySelectorAll('.modal.active')
    modals.forEach(modal => {
        closeModal(modal)
    })
})

closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
      const modal = button.closest('.modal')
      closeModal(modal)
    })
})

function openModal(modal) {
    if (modal == null) return
    modal.classList.add('active')
    overlay.classList.add('active')
}

function closeModal(modal) {
    if (modal == null) return
    modal.classList.remove('active')
    overlay.classList.remove('active')
}




// prompt toggle 1
// *
// *

let promptBtn = document.getElementById('newli2');

let promptCancel = document.getElementById('promptCancel');
let promptConfirm = document.getElementById('promptConfirm');
let inputPrompt = document.getElementById('input3');

function hidePrompt(event) {
    let value;

    if(event.target.textContent === 'Confirm' || event.key == 'Enter') {
        value = inputPrompt.value;
    } else {
        value = null;
    }
    // console.log(value);

    const modalsN = document.querySelectorAll('.modal.active')
    modalsN.forEach(modal => {
        closeModal(modal)
    })

    
    if(value != null) {
        document.getElementById("nameoflist2").innerHTML = value;

        document.getElementById('form2').style.display = 'block';
        document.getElementById('tmr1').style.display = 'block';

        localStorage.setItem('list2', true);
        localStorage.setItem('nameoflist2', value);
    }

    if(value === null) {
        return;
    }

    document.getElementById('newli2').style.display = 'none';

    inputPrompt.value = '';
}

promptConfirm.addEventListener('click', hidePrompt);
promptCancel.addEventListener('click', hidePrompt);


// confirm on key press enter
function clickPress(event) {
    if(event.key == "Enter") {
        hidePrompt(event);
    }
}



// prompt toggle 2
// *
// *

let promptBtn2 = document.getElementById('newli');

let promptCancel2 = document.getElementById('promptCancel2');
let promptConfirm2 = document.getElementById('promptConfirm2');
let inputPrompt2 = document.getElementById('input4');

function hidePrompt2(event) {
    let value1;

    if(event.target.textContent === 'Confirm' || event.key == 'Enter') {
        value1 = inputPrompt2.value;
    } else {
        value1 = null;
    }
    // console.log(value1);

    const modalsN = document.querySelectorAll('.modal.active')
    modalsN.forEach(modal => {
        closeModal(modal)
    })

    
    if(value1 != null) {
        document.getElementById("nameoflist1").innerHTML = value1;

        document.getElementById('form1').style.display = 'block';
        document.getElementById('tmr').style.display = 'block';

        localStorage.setItem('list1', true)
        localStorage.setItem('nameoflist1', value1)
    }

    if(value1 === null) {
        return;
    }

    document.getElementById('newli').style.display = 'none';

    if (!localStorage.list2) {
        document.getElementById('newli2').style.display = 'block';
    }

    inputPrompt2.value = '';
}

promptConfirm2.addEventListener('click', hidePrompt2);
promptCancel2.addEventListener('click', hidePrompt2);

// confirm on key press enter
function clickPress2(event) {
    if(event.key == "Enter") {
        hidePrompt2(event);
    }
}


document.getElementById('input3').focus();
document.getElementById('input4').focus();