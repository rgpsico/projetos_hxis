//BOM JANELA BARRA DE ENDEREÇO < MINIMIZAR FECHAR 
//DOM DOCUMENTO div etc

class calcController {
    constructor() {
        this._audio = new Audio('lill.mp3');
        this._audioOnOff = false;
        this._lastOperator = '';
        this._lastNumber = '';

        this._operation = [];
        this._locale = "pt-BR";
        this._displatCalcE1 = document.querySelector("#display");
        this._dateE1 = document.querySelector("#data");
        this._timeE1 = document.querySelector("#hora");
        this._currentDate;
        this.initialize();
        this.initButtonEvents();
        this.initKeyboard();
    }

    PastefromClipBoard(){
        document.addEventListener('paste',e=>{
             let text = e.clipboardData.getData('Text');
            this.displayCalc = parseFloat(text);
             console.log(text);
           
           
            });

    }
    copyToClipBoard(){
        let input = document.createElement('input');
        input.value = this.displayCalc;
        document.body.appendChild(input);

        input.select();

        document.execCommand('Copy');
        input.remove();




    }

    initialize() {
        this.setDisplayDateTime();

        setInterval(() => {
            this.setDisplayDateTime();
        }, 1000);


        this.setLastNumberToDisplay();
        this.PastefromClipBoard();

        document.querySelectorAll('.btn-ac').forEach(btn=>{

         btn.addEventListener('click',e=>{
               this.toggleAudio();
          });

        });
    }//fimInitialize

    toggleAudio(){
     this._audioOnOff  = !this._audioOnOff;
     console.log(this._audioOnOff);

    }
    playAudio(){
        if(this._audioOnOff){
            this._audio.currentTime = 0;
            this._audio.play();

        }
    }


    addEventListenerAll(element, events, fn) {
        events.split(' ').forEach(event => {
            element.addEventListener(event, fn, false);
        });
    }

    initKeyboard(){

        document.addEventListener('keyup', e=>{
            this.playAudio();
            console.log(e.key);
                     switch (e.key) {
                    case 'Escape':
                        this.clearAll();
                        break;
                    case 'Backspace':
                        this.clearEntry();
                        break;
                        case'+':
                        case'-':
                        case'*':
                        case'/':
                        case'%':
                        this.addOperation(e.key);
                        break;
                    case 'Enter':
                    case '=':
                        this.calc();
                        break;
                    case '.':
                    case ',':
                        this.addDot();
                        break;

                    case '0':
                    case '1':
                    case '2':
                    case '3':
                    case '4':
                    case '5':
                    case '6':
                    case '7':
                    case '8':
                    case '9':
                        this.addOperation(parseInt(e.key));
                        break;
                        case 'c':
                            if(e.ctrlKey) this.copyToClipBoard();
                        break;
        
        
        
                }
        
            });

     

    }


    clearAll() {
        this._operation = [];
        this._lastNumber = '';
        this._lastOperator = '';
        this.setLastNumberToDisplay();
    }

    clearEntry() {
        this._operation.pop();
        this.setLastNumberToDisplay();
    }


   


    getLastOperation() {
        return this._operation[this._operation.length - 1];

    }

    setLastOperation(value) {
        this._operation[this._operation.length - 1] = value;

    }

    isOperator(value) {
        return (['+', '-', '*', '/'].indexOf(value) > -1);

    }

    pushOperation(value) {
        this._operation.push(value);
        if (this._operation.length > 3) {
            this.calc();
        }

    }
    getResult(){
          console.log('get result',this._operation);

        return eval(this._operation.join(""));
    }

    calc() {
        let last = '';
        this._lastOperator = this.getLastItem();
      
        if(this._operation.length < 3) {
            let firstItem = this._operation[0];
            this._operation = [firstItem , this._lastOperator, this._lastNumber];

        }

          if(this._operation.length > 3) {
             last = this._operation.pop();          
             this._lastNumber = this.getResult();
               
           }else if(this._operation.length == 3){       
        this._lastNumber =   this.getLastItem(false);

         }
   console.log('lastoperator',this._lastOperator);
   console.log('last_number',this._lastNumber);  
        let result = this.getResult()

      if(last == '%'){ 
                 
         result /= 100;        
         
         this._operation = [result];

      }else{

          this._operation = [result];
          if(last) this._operation.push(last);

      }
  
        this.setLastNumberToDisplay();
    }
            
  
  
      getLastItem(isOperator = true){
        let LastItem;

        for (let i = this._operation.length - 1; i >= 0; i--) {            
          
            if (this.isOperator(this._operation[i]) == isOperator) {
                LastItem = this._operation[i];
                break;
            }
         
  
    }
    if(!LastItem){
        LastItem = (isOperator) ? this._lastOperator : this._lastNumber;
    }
    return LastItem;
}

    setLastNumberToDisplay() {
        let lastNumber = this.getLastItem(false);
       
        if(!lastNumber) lastNumber = 0;
        this.displayCalc = lastNumber;


    }


    addOperation(value) {
     
        if (isNaN(this.getLastOperation())) {

            if (this.isOperator(value)) {

                this.setLastOperation(value);

            } else if (isNaN(value)) {

                //outra coisa
                console.log('outra coisa' + value);

            } else {
                this.pushOperation(value);

                this.setLastNumberToDisplay();
            }
        } else {

            if (this.isOperator(value)) {
                this.pushOperation(value);

            } else {
                let newValue = this.getLastOperation().toString() + value.toString();
                this.setLastOperation(newValue);
                //atualizar o display 
                this.setLastNumberToDisplay();
            }


        }
        console.log(this._operation);

    }

    setError() {
        this.displayCalc = "Error";
    }

addDot(){
   let lastoperation =  this.getLastOperation();


   
   console.log(lastoperation);
   if(typeof lastoperation === 'string' && lastoperation.split('').indexOf('.') > -1) return;
   if(this.isOperator(lastoperation || !lastoperation)){
       this.pushOperation('0.')
   }else{
       this.setLastOperation(lastoperation.toString()+'.');
   }
   this.setLastNumberToDisplay();
}
    execBtn(value) {
        this.playAudio();
        switch (value) {
            case 'ac':
                this.clearAll();
                break;
            case 'ce':
                this.clearEntry();
                break;
            case 'soma':
                this.addOperation('+');
                break;
            case 'subtracao':
                this.addOperation('-');
                break;
            case 'divisao':
                this.addOperation('/');
                break;
            case 'multiplicacao':
                this.addOperation('*');
                break;
            case 'porcento':
                this.addOperation('%');
                break;
            case 'igual':
                this.calc();
                break;
            case 'ponto':
                this.addDot();
                break;
            case '0':
            case '1':
            case '2':
            case '3':
            case '4':
            case '5':
            case '6':
            case '7':
            case '8':
            case '9':
                this.addOperation(parseInt(value));
                break;


            default:
                this.setError();
                break;


        }

    }

    initButtonEvents() {
        let buttons = document.querySelectorAll("#buttons > g, #parts > g");

        buttons.forEach((btn, index) => {
            this.addEventListenerAll(btn, "click drag", e => {

                let textBtn = btn.className.baseVal.replace("btn-", "");
                this.execBtn(textBtn);

            });

            this.addEventListenerAll(btn, "mouseover mouseup mousedown", e => {
                btn.style.cursor = "pointer";
            });

        });




    }


    setDisplayDateTime() {
        this.displayDate = this.currentDate.toLocaleDateString(this._locale);
        this.displaytime = this.currentDate.toLocaleTimeString(this._locale);
    }

    get displaytime() {
        return this._timeE1.innerHTML;
    }

    set displaytime(value) {
        return this._timeE1.innerHTML = value;
    }


    get displayDate() {
        return this._dateE1.innerHTML;

    }

    set displayDate(value) {
        return this._dateE1.innerHTML = value;


    }

    get displayCalc() {
        return this._displatCalcE1.innerHTML;
    }

    set displayCalc(value) {
        this._displatCalcE1.innerHTML = value;
    }

    //DATA ATUAL
    get currentDate() {
        return new Date();
    }
    set currentDate(valor) {
        this._dataAtual = valor;
    }




}