/**
 * Created by ZHC on 2017/6/5.
 */


    class Upload{
        constructor(){
            this.type=["image/jpeg","image/png","image/gif"];
            // this.size=1024*1024*5;
            // this.parent=params;
            this.size=1000000;
            // this.contain=box;
            // this.file=file;
            // this.filediv=filediv;
            // this.listbox=list;
            // this.upbtn=upbtn;
            this.lists=[];

            // file按钮
            this.filedivstyle={width:'100px',height:'40px','text-align':'center','line-height':'40px',background:'coral'};
            // 所有图片大盒子
            this.containstyle={width: '500px',height: 'auto',border: '1px solid #ccc',padding: '10px','box-sizing': 'border-box',margin: '10px 10px',overflow: 'hidden',};
            // 每一张图片盒子
            this.lisiboxstyle={margin: '10px',width: '100px',height: '100px',};
            // 进度条
            this.progressstyle={width:'0%',height:'20px',background:'red'};
            // 删除按钮
            this.delstyle={width:'20px',height:'20px','text-align':'center','line-height':'center',background:'#ccc'};
            // 提示消息
            this.messstyle={width:'100%',height:'20px','text-align':'center','line-height':'center',background:'#ccc',opacity:'0.8'};
            this.createContain();
            this.createSelect();
            this.createUpbtn();
            this.change()
        }


        change(){
            let that=this;
            this.file.onchange=function () {
                // 把json格式的对象转成数组
                that.data = Array.prototype.slice.call(this.files);
                that.check();
            alert(1)
            }
        }

        up(url){
            let that=this;
            this.upbtn.onclick=function () {
                if (!url) {
                    console.error("必须要传入地址");
                    return;
                }

                for(let i=0;i<that.data.length;i++){
                    let form=new FormData();
                    form.append("file",that.data[i])

                    let ajax = new XMLHttpRequest();

                    ajax.onload = function () {
                        // console.log(document.querySelector('.img'))
                        // console.log(ajax.response);
                        document.querySelector('.img').value=ajax.response;

                    }

                    ajax.upload.onprogress = function (e) {
                        let total = e.total;
                        let loaded = e.loaded;
                        let bili = loaded / total * 100 + "%";
                        let back = that.lists[i].progress;
                        back.innerHTML=bili;
                        back.style.width = bili;
                    }

                    ajax.open("post", url);
                    ajax.send(form);
                }
            }
        }

        // 检测
        check(){
            // 定义一个空数组
            let temp=[];
            for(let i=0;i<this.data.length;i++){
                // 把传进来的每张图片的信息保存到数组中
                temp[i]=this.data[i];
            }
            for(let i=0;i<temp.length;i++){
                // 调用创建图片块
                let obj=this.createList();
                let read = new FileReader();
                read.readAsDataURL(temp[i]);
                read.onload=function (e) {
                    obj.img.src=e.target.result;
                };
                let del=obj.del;

                // 如果不满足这个条件                     检测这个字符串中有没有
                if(!(temp[i].size<this.size&&this.type.indexOf(temp[i].type)>-1)){
                    obj.mess.style.display="block";
                    obj.mess.innerHTML="不符合条件";
                    // console.log(temp[i])
                    for(let j=0;j<temp.length;j++){
                        if(this.data[i]===temp[j]){
                            this.data.splice(i,1)
                        }
                        del.onclick=function () {
                            this.parentNode.parentNode.removeChild(this.parentNode)
                        }
                    }
                    // console.log(this.data)
                }else{
                    obj.div.className=temp[i].name;
                    this.lists.push(obj);
                    //符合条件的删除
                    del.onclick=function () {
                        for(let j=0;j<temp.length;j++){
                            if(this.parentNode.className===temp[j].name){
                                temp.splice(j,1)
                            }
                        }
                        this.parentNode.remove();
                        console.log(temp);
                    }

                }
            }

        }
        // 创建盒子
        createContain(){
            if(!this.parent){
                this.parent=document.querySelector('aside');
            }
            if(this.contain){
                return;
            }
            // 所有图片盒子
            this.contain=document.createElement('div');
            this.contain.style.cssText="width:"+this.containstyle.width+";height:"+this.containstyle.height+";overflow:"+this.containstyle.overflow+";border:"+this.containstyle.border+";padding:"+this.containstyle.padding+';box-sizing:'+this.containstyle['box-sizing']+";margin:"+this.containstyle.margin;
            this.parent.appendChild(this.contain)

        }
        // 创建list
        createList(){
            if(this.listbox){
                return;
            }
            // 每一张图片盒子
            let div=document.createElement('div');
            div.style.cssText="width:"+this.lisiboxstyle.width+";height:"+this.lisiboxstyle.height+";float:left;position:relative;border:1px solid #ccc;margin:0 5px;";
            this.contain.appendChild(div);

            // 图片
            let img=document.createElement('img');
            img.style.cssText="width:100%;height:100%";
            div.appendChild(img);

            // 进度条
            let progress=document.createElement('section');
            progress.style.cssText="width:"+this.progressstyle.width+";height:"+this.progressstyle.height+";background:"+this.progressstyle.background+";position: absolute;top:0;left:0;right:0;bottom:0;margin:auto;text-align:center;";
            div.appendChild(progress);

            // 删除按钮
            let del=document.createElement('div');
            del.style.cssText="width:"+this.delstyle.width+";height:"+this.delstyle.height+";text-align:"+this.delstyle['text-align']+";line-height:"+this.delstyle['line-height']+";background:"+this.delstyle.background+";position:absolute;top:5px;right:5px;border-radius:10px;display:none;transition: transform .5s;";
            del.innerText="×";
            div.appendChild(del);


            // 提示消息
            let mess=document.createElement('div');
            mess.style.cssText="width:"+this.messstyle.width+";height:"+this.messstyle.height+";text-align:"+this.messstyle['text-align']+";line-height:"+this.messstyle['line-height']+";background:"+this.messstyle.background+";position:absolute;bottom:0;left:0;display:none";
            div.appendChild(mess);

            div.onmouseover=function () {
                del.style.display="block";
                del.style.cursor="pointer";
            };
            div.onmouseout=function () {
                del.style.display="none"
            };
            // 返回对象 要操作的list盒子  图片  进度条  提示消息
            return{
                div:div,
                img:img,
                progress:progress,
                mess:mess,
                del:del
            }
        }
        // 创建选择图片按钮
        createSelect(){
            if(this.filediv){
                return;
            }
            this.filediv=document.createElement('div');
            this.filediv.style.cssText="width:"+this.filedivstyle.width+";height:"+this.filedivstyle.height+";text-align:"+this.filedivstyle['text-align']+";line-height:"+this.filedivstyle['line-height']+";background:"+this.filedivstyle.background+";border-radius:10px;position: relative;";
            this.filediv.innerText='上传图片';
            this.parent.insertBefore(this.filediv,this.contain);

            if(this.file) {
                return;
            }
            this.file=document.createElement('input');
            this.file.setAttribute('type','file');
            this.file.setAttribute('name','file');
            this.file.multiple="multiple";
            this.file.style.cssText="width: 100%;height: 100%;opacity: 0;position: absolute;left: 0;top: 0;";
            this.filediv.appendChild(this.file)

        }
        // 创建上传按钮
        createUpbtn(){
            if(this.upbtn){
               return;
            }
            this.upbtn=document.createElement('div');
            this.upbtn.style.cssText="width: 100px; height: 40px; text-align: center; line-height: 40px; background: coral; border-radius: 10px; position: relative;"

            let btn=document.createElement('button');
            btn.setAttribute('type','button');
            btn.style.cssText="width: 100px; height: 40px; text-align: center;line-height: 40px;border:none;background: coral; border-radius: 10px;";
            btn.innerText="上传";
            this.upbtn.appendChild(btn);
            this.parent.appendChild(this.upbtn);
        }
    }


