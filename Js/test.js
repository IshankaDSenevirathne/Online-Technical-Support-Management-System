function dayz(){
            for(i in days){
                document.write(i+'<br>');
            }
            x=2;
            y = (x==1)?'one':'two';
            document.write(y);
            switch(x){
            case 1:
                document.write('1');
                break;
            case 2:
                document.write('2');
                break;
            default:
                document.write('5');
           }
        }
car={
    modal:'BMW',
    number:'12345',
    color:'red'
}
//object constructer function
function rectangle(w,h){
    this.width=w;
    this.height=h;
    this.area=rect_Area;
    this.perimeter=rect_Perimeter;
}
//area function
function rect_Area(){
    return this.width*this.height;
}
function rect_Perimeter(){
    return 2*(this.width+this.height);
}
function create(w,h){
    console.log(w);
    console.log(h);
    rect=new rectangle(w,h);
    document.write(rect.area());
    document.write(rect.perimeter());
}
