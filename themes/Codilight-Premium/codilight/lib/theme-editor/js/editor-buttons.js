(function() {
    tinymce.create('tinymce.plugins.UXDE', {
        init : function(ed, url) {
            ed.addButton('uxde');
            ed.addButton('uxde_buttons_snippet', {
                title : 'Insert buttons example',
                image : 'http://dl.dropboxusercontent.com/s/7kkp82cz81kozwj/buttons.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '' + "\n" + '[button url="http://www.example.com/" target="e.g. _blank or _self" style="e.g. grey, blue, red, orange, light-blue, purple, black, green, pink, yellow" size="e.g. small, medium, large"] Button Text [/button]');
                }
            });
			ed.addButton('uxde_alerts_snippet', {
                title : 'Insert alerts example',
                image : 'http://dl.dropboxusercontent.com/s/9pyvl6j9d4jqu3t/alerts.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '' + "\n" + '[alert style="e.g. white, grey, red, yellow, green"] Alert message. [/alert]');
                }
            });
			ed.addButton('uxde_quote_snippet', {
                title : 'Insert quote example',
                image : 'http://dl.dropboxusercontent.com/s/60k8nlmn3d0u875/quote.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '' + "\n" + '[quote align="e.g. center, left, right" color="#999999"] Content [/quote]');
                }
            });
			ed.addButton('uxde_dropcap_snippet', {
                title : 'Insert dropcap example',
                image : 'http://dl.dropboxusercontent.com/s/rd8li607fmkfgle/dropcap.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '' + "\n" + '[dropcap type="e.g. circle or none" color="#ffffff" background="#e53b2c"] S [/dropcap]');
                }
            });
			ed.addButton('uxde_highlight_snippet', {
                title : 'Insert highlight example',
                image : 'http://dl.dropboxusercontent.com/s/hwthu2155d0eejm/highlight.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '' + "\n" + '[highlight type="e.g. yellow, black, green, red, grey"] Content [/highlight]');
                }
            });
			ed.addButton('uxde_list_snippet', {
                title : 'Insert list example',
                image : 'http://dl.dropboxusercontent.com/s/wqfm8w7rxwrtaem/list.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '' + "\n" + '[ul type="e.g. check, check-bold, arrow, arrow-bold, square, circle"] Content [/ul]');
                }
            });
			ed.addButton('uxde_tabs_snippet', {
                title : 'Insert tabs example',
                image : 'http://dl.dropboxusercontent.com/s/hmo543kx5zt5ggu/tabs.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '' + "\n" + '[tabs] [tab title="Tab 1"] Content [/tab] [tab title="Tab 2"] Content [/tab] [/tabs]');
                }
            });
            ed.addButton('uxde_toggle_snippet', {
                title : 'Insert toggle example',
                image : 'http://dl.dropboxusercontent.com/s/j6c4i99gwah34gm/toogle.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '' + "\n" + '[toggle title="Title" state="e.g. active or closed"] Content [/toggle]');
                }
            });
			ed.addButton('uxde_testimonial_snippet', {
                title : 'Insert testimonial example',
                image : 'http://dl.dropboxusercontent.com/s/0mqrriszt2agc0c/testimonial.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '' + "\n" + '[testimonial name="Name" site="Website" url="http://www.example.com"] Content [/testimonial]');
                }
            });
			ed.addButton('uxde_youtube_snippet', {
                title : 'Insert Youtube example',
                image : 'http://dl.dropboxusercontent.com/s/8hn1d4pw9otaqsm/youtube.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '' + "\n" + '[youtube width="602" height="350" video_id="Vpg9yizPP_g"]');
                }
            });
			ed.addButton('uxde_vimeo_snippet', {
                title : 'Insert Vimeo example',
                image : 'http://dl.dropboxusercontent.com/s/a5l7s57r7bswfv5/vimeo.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '' + "\n" + '[vimeo width="602" height="350" video_id="27299211"]');
                }
            });
			ed.addButton('uxde_dailymotion_snippet', {
                title : 'Insert Dailymotion example',
                image : 'http://dl.dropboxusercontent.com/s/pck0197i91sf00v/dailymotion.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '' + "\n" + '[dailymotion width="602" height="350" video_id="xumrp3"]');
                }
            });
			ed.addButton('uxde_pricing_snippet', {
                title : 'Insert pricing example',
                image : 'http://dl.dropboxusercontent.com/s/xg1ugfl39nmna56/pricing.png',
                onclick : function() {
					ed.execCommand('mceInsertContent', false, '' + "\n" + '[ view example at: http://www.uxde.net/test/codilight/?page_id=566 ]');
                }
            });

        },
        createControl : function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('uxde', tinymce.plugins.UXDE);
})();
