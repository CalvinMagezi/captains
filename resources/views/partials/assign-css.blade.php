<style>


#left {
  float: left;
  width: 100%;
  border: 1px solid #ccc;
  box-shadow: 0px 1px 9px #ccc;
  margin-top: 2em;
  padding-bottom: 3em;
}

#right {
  float: right;
  width: 100%;
  border: 1px solid #ccc;
  box-shadow: 0px 1px 9px #ccc;
  margin-top: 2em;
  height: 700px;
  overflow-y: scroll;
  overflow-x: hidden;
}

@media only screen and (max-width: 1235px) {
  #right {
    width: 100%;
    float: none;
  }
  #left {
    width: 100%;
    float: none;
  }
}

@media only screen and (max-width: 1235px) {
  #right {
    width: 100%;
    float: none;
  }
  #left {
    width: 100%;
    float: none;
  }
}

#form-wrapper {
  padding: 1em;
}

#form-col-wrapper {
  padding-top: 1em;
}

#form-left {
  float: left;
  width: 100%;  
}

#form-right {
  float: right;
  width: 33%;
}

.assigning  .input_numbers::placeholder {
  color: #ccc;
  text-indent: 5px;
  line-height: 2em;
  font-family: 'Roboto', sans-serif;
}
.assigning  .input_numbers{
  color: #000;
  width: 100%;
  text-indent: 5px;
  line-height: 2em;
  font-family: 'Roboto', sans-serif;
}

.assigning .form-footer {
  clear: both;
}
#right-wrapper {
  padding: 1em;
}
.assigning form h1 {
  font-family: 'Roboto Slab', serif;
  color: #333;
  margin: 4px 0;
  padding-bottom: 0.5em;
  border-bottom: 1px dotted #ccc;
}

.assigning h3 {
  color: #3366cc;
}

.assigning h2 {
  color: #3366cc;
  border-bottom: dotted 1px #ccc;
}

.assigning ul {
  list-style-type: none;
  padding: 1em;
  background-color: #fff;
  border-radius: 8px;
  border: 1px solid #efefef;
  width: 90%;
  margin: 1em auto;
}

li {
  display: inline;
  margin-right: 1em;
}

textarea {
  width: 100%;
  height: 2em;
}

.assigning .submit-button {
  position: relative;
  left: 40%;
  font-size: 16px;
  font-family: 'Roboto', sans-serif;
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  color: #ffffff;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
  border: none;
  display: block;
  background: #be3110;
  background-image: -webkit-linear-gradient(top, #dc3912, #be3110);
  background-image: -moz-linear-gradient(top, #dc3912, #be3110);
  background-image: -ms-linear-gradient(top, #dc3912, #be3110);
  background-image: -o-linear-gradient(top, #dc3912, #be3110);
  background-image: linear-gradient(to bottom, #dc3912, #be3110);
}

.assigning .submit-button:hover {
  background: #dc3912;
  background-image: -webkit-linear-gradient(top, #be3110, #dc3912);
  background-image: -moz-linear-gradient(top, #be3110, #dc3912);
  background-image: -ms-linear-gradient(top, #be3110, #dc3912);
  background-image: -o-linear-gradient(top, #be3110, #dc3912);
  background-image: linear-gradient(to bottom, #be3110, #dc3912);
}

.assigning .person {
  font-size: 16px;
  -webkit-border-radius: 10;
  -moz-border-radius: 10;
  border-radius: 10px;
  color: #ffffff;
  padding: 5px 10px;
  text-decoration: none;
  border: none;
  background: #ccc;
}
.assigning .task-diff {
  font-size: 16px;
  -webkit-border-radius: 10;
  -moz-border-radius: 10;
  border-radius: 10px;
  color: #ffffff;
  padding: 5px 10px;
  text-decoration: none;
  border: none;
  background-color: #CCC;
}

.assigning .easy {
  background-color: #3366cc;
}

.assigning .hard {
  background-color: #dc3912;
}

.assigning .moderate {
  background-color: #ff9900;
}

.assigning .task-descrip {
  line-height: 2em;
}
</style>