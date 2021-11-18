let form = document.querySelector('section.left form')
console.log(form)

form.addEventListener('submit', (e) => {
    e.preventDefault()
    
    let form = e.currentTarget;
    let contain = e.currentTarget.parentElement;
    let memoMonth = form.children[0].value;
    let memoDate = form.children[1].value;
    let memoText = form.children[2].value;
    if (memoText == '') {
        alert('Pleaser Enter some text.')
        return
    }

    let storage = document.createDocumentFragment();
    //memo main
    let memo = document.createElement('section');
    memo.classList.add('memo');
    
    let time = document.createElement('p');
    time.classList.add('memo-time');
    time.innerText = memoMonth + ' - ' + memoDate;
    
    let text = document.createElement('p');
    text.classList.add('memo-text');
    text.innerText = memoText;


    storage.appendChild(time);
    storage.appendChild(text);

    contain.appendChild(memo);


    
    // memo.addEventListener("click", () => {
    //     memo.classList.toggle('done');
    // })
    
    let trashButton = document.createElement('a');
    trashButton.classList.add('trash');
    trashButton.innerHTML = "<i class='far fa-trash-alt'></i>";

    trashButton.addEventListener('click', (e) => {
        let todoItem = e.target.parentElement
        //當動畫結束時再去進行動作
        todoItem.addEventListener('animationend', () => {
            todoItem.remove()
        })
        todoItem.style.animation = 'scaleDown 0.5s forwards'
    })
    

    storage.appendChild(trashButton);
    console.log(storage);
    memo.appendChild(storage);
    contain.appendChild(main);


})
