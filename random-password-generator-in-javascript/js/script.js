console.log( 'neues Passwort mit folgendem Befehl:' );
console.log( 'new_password()' );

let c = 0;

function generate_password(){
    arr = [
        arra = [
            'a', 'b', 'c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
        ],
        arrA = [
            'A', 'B', 'C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
        ],
        arr0 = [
            1,2,3,4,5,6,7,8,9,0
        ],
        arrS = [
            '!',"§","$","%","&","/","(",")","=","?","#","+","-","<",">"
        ]
    ];


    let rando = Math.round( 8 + Math.random() * 8 );

    let pw = [];

    for( let i = 0; i < rando; i++ ){
        let randoArr = Math.floor( Math.random() * 4 );
        // console.log( 'randoArr', randoArr );
        let randoZeich = Math.floor( Math.random() * arr[randoArr].length );

        let zeichen = arr[randoArr][randoZeich];

        pw.push( zeichen );
    }
    return pw;
}

function show_password( arr ){
    let password = '';
    for( let i = 0; i < arr.length; i++ ){
        password += arr[i];
    }
    return password;
}

function get_text(){
  let t = document.querySelector( '.pwtxt' );
  return t;
}

function get_generate_btn(){
  let t = document.querySelector( '.generator' );
  return t;
}

get_generate_btn().addEventListener( 'click', function(){
  c++;
  if( c === 3 ){
    t = get_text();
    t.textContent = 'somethingNotRandom ;)';
    t.classList.add( 'blue' );
  }else{
    t = get_text();
    let p = show_password( generate_password() );
    t.textContent = p;
    t.classList.remove( 'blue' );
  }
} );