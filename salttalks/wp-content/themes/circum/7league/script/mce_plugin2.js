(function() {
    tinymce.create('tinymce.plugins.o12', {
        init : function(ed, url) {
            ed.addButton('o12', {
                title : 'One Half',
                image : url+'/onehalf.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[one_half]</p>'+ed.selection.getContent()+'<p>[/one_half]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('o12', tinymce.plugins.o12);
 })();

(function() {
    tinymce.create('tinymce.plugins.o12l', {
        init : function(ed, url) {
            ed.addButton('o12l', {
                title : 'One Half Last',
                image : url+'/onehalflast.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[one_half_last]</p>'+ed.selection.getContent()+'<p>[/one_half_last]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('o12l', tinymce.plugins.o12l);
 })();

(function() {
    tinymce.create('tinymce.plugins.o13l', {
        init : function(ed, url) {
            ed.addButton('o13l', {
                title : 'One Third Last',
                image : url+'/onethirdlast.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[one_third_last]</p>'+ed.selection.getContent()+'<p>[/one_third_last]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('o13l', tinymce.plugins.o13l);
 })();

(function() {
    tinymce.create('tinymce.plugins.o13', {
        init : function(ed, url) {
            ed.addButton('o13', {
                title : 'One Third',
                image : url+'/onethird.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[one_third]</p>'+ed.selection.getContent()+'<p>[/one_third]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('o13', tinymce.plugins.o13);
 })();

(function() {
    tinymce.create('tinymce.plugins.o23', {
        init : function(ed, url) {
            ed.addButton('o23', {
                title : 'Two Third',
                image : url+'/twothird.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[two_third]</p>'+ed.selection.getContent()+'<p>[/two_third]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('o23', tinymce.plugins.o23);
 })();

(function() {
    tinymce.create('tinymce.plugins.o23l', {
        init : function(ed, url) {
            ed.addButton('o23l', {
                title : 'Two Third Last',
                image : url+'/twothirdlast.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[two_third_last]</p>'+ed.selection.getContent()+'<p>[/two_third_last]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('o23l', tinymce.plugins.o23l);
 })();

(function() {
    tinymce.create('tinymce.plugins.o14', {
        init : function(ed, url) {
            ed.addButton('o14', {
                title : 'One Fourth',
                image : url+'/onefourth.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[one_fourth]</p>'+ed.selection.getContent()+'<p>[/one_fourth]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('o14', tinymce.plugins.o14);
 })();

(function() {
    tinymce.create('tinymce.plugins.o14l', {
        init : function(ed, url) {
            ed.addButton('o14l', {
                title : 'One Fourth Last',
                image : url+'/onefourthlast.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[one_fourth_last]</p>'+ed.selection.getContent()+'<p>[/one_fourth_last]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('o14l', tinymce.plugins.o14l);
 })();

(function() {
    tinymce.create('tinymce.plugins.o34', {
        init : function(ed, url) {
            ed.addButton('o34', {
                title : 'Three Fourth',
                image : url+'/threefourth.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[three_fourth]</p>'+ed.selection.getContent()+'<p>[/three_fourth]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('o34', tinymce.plugins.o34);
 })();

(function() {
    tinymce.create('tinymce.plugins.o34l', {
        init : function(ed, url) {
            ed.addButton('o34l', {
                title : 'Three Fourth Last',
                image : url+'/threefourthlast.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[three_fourth_last]</p>'+ed.selection.getContent()+'<p>[/three_fourth_last]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('o34l', tinymce.plugins.o34l);
 })();

(function() {
    tinymce.create('tinymce.plugins.clear', {
        init : function(ed, url) {
            ed.addButton('clear', {
                title : 'Clear Both',
                image : url+'/clear.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[clear]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('clear', tinymce.plugins.clear);
 })();  
(function() {
    tinymce.create('tinymce.plugins.login', {
        init : function(ed, url) {
            ed.addButton('login', {
                title : 'Insert a Login Form, if User is not loggt in',
                image : url+'/login.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[login-form]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('login', tinymce.plugins.login);
 })();

(function() {
    tinymce.create('tinymce.plugins.search', {
        init : function(ed, url) {
            ed.addButton('search', {
                title : 'Insert a Search Field',
                image : url+'/search.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[search]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('search', tinymce.plugins.search);
 })();
  


(function() {
    tinymce.create('tinymce.plugins.o15', {
        init : function(ed, url) {
            ed.addButton('o15', {
                title : 'One Fifth',
                image : url+'/onefifth.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[one_fifth]</p>'+ed.selection.getContent()+'<p>[/one_fifth]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('o15', tinymce.plugins.o15);
 })();

(function() {
    tinymce.create('tinymce.plugins.o15l', {
        init : function(ed, url) {
            ed.addButton('o15l', {
                title : 'One Fifth Last',
                image : url+'/onefifthlast.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[one_fifth_last]</p>'+ed.selection.getContent()+'<p>[/one_fifth_last]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('o15l', tinymce.plugins.o15l);
 })();

 
(function() {
    tinymce.create('tinymce.plugins.o16', {
        init : function(ed, url) {
            ed.addButton('o16', {
                title : 'One Sixth',
                image : url+'/onesixth.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[one_sixth]</p>'+ed.selection.getContent()+'<p>[/one_sixth]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('o16', tinymce.plugins.o16);
 })();

(function() {
    tinymce.create('tinymce.plugins.o16l', {
        init : function(ed, url) {
            ed.addButton('o16l', {
                title : 'One Sixth Last',
                image : url+'/onesixthlast.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '<p>[one_sixth_last]</p>'+ed.selection.getContent()+'<p>[/one_sixth_last]</p>'); 
                }
            });
        },
        createControl : function(n, cm) {return null;},
    });
    tinymce.PluginManager.add('o16l', tinymce.plugins.o16l);
 })();














