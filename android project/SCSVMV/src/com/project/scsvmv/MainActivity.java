package com.project.scsvmv;


import android.annotation.TargetApi;
import android.app.Activity;
import android.os.Build;
import android.os.Bundle;
import android.view.KeyEvent;
import android.view.Menu;
import android.view.MenuItem;
import android.view.Window;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;


public class MainActivity extends Activity {
	
	WebView webView;
	 @TargetApi(Build.VERSION_CODES.HONEYCOMB)
	@Override
	    public void onCreate(Bundle savedInstanceState) {

	        super.onCreate(savedInstanceState);

	        //Remove title bar as we already have it in the web app
	        this.requestWindowFeature(Window.FEATURE_NO_TITLE);

	        //Point to the content view defined in XML
	        setContentView(R.layout.activity_main);

	        //Configure the webview setup in the xml layout
	        webView = (WebView) findViewById(R.id.webview);
	        WebSettings webSettings = webView.getSettings();

	        //Yes, we want javascript, pls.
	        webSettings.setJavaScriptEnabled(true);
	        //Zoom in Controls
	        webSettings.setBuiltInZoomControls(true);
	        webSettings.setDisplayZoomControls(false);
	        
	        //If HTML5 Offline Storage
	        webSettings.setDatabaseEnabled(true);
            webSettings.setDomStorageEnabled(true);


	        //Make sure links in the webview is handled by the webview and not sent to a full browser
	        webView.setWebViewClient(new WebViewClient(){
	        	public void onReceivedError(WebView view,int errorCode,String description,String failingUrl)
	        	{
	        	webView.loadUrl("file:///android_asset/error.html");
	        	}
	        });

	        //And let the fun begin
	        webView.loadUrl("file:///android_asset/index.html");
                //And let the fun begin
	        //webView.loadUrl("https://google.com/");

			
	        return;
	        
	    }
	
	 @Override
	 public boolean onKeyDown(int keyCode, KeyEvent event) {
	  if ((keyCode == KeyEvent.KEYCODE_BACK) && webView.canGoBack()) {
		  webView.goBack();
	   return true;
	  }
	  return super.onKeyDown(keyCode, event);
	 }
	 	
	    @Override public boolean onCreateOptionsMenu(Menu menu)
	    {
	        menu.add(0, 1, 1, "Reload")
	            .setIcon(android.R.drawable.ic_menu_revert);
	        menu.add(0, 2, 2, "Exit")
	            .setIcon(android.R.drawable.ic_menu_close_clear_cancel);
			
	        return true;
	    }

	    @Override public boolean onOptionsItemSelected(MenuItem item)
	    {
	    	switch(item.getItemId()) {

	        case 1: /* refresh */
	            webView.loadUrl("file:///android_asset/index.html");
	            break;

	    	case 2: /* exit */
	            this.finish();
	            break;
	        }

	        return true;
	    }
}