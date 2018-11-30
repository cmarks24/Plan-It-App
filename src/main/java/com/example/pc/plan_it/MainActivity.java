package com.example.pc.plan_it;

import android.support.v7.app.AppCompatActivity;
        import android.os.Bundle;
        import android.widget.TextView;

public class MainActivity extends AppCompatActivity {
    TextView textView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

    }

    TextView textView = (TextView) findViewById(R.id.textView);
    //textView.setText("AbhiAndroid"); //s
    TextView textView2 = (TextView) findViewById(R.id.textView2);
    //TextView textView3 = (TextView)findViewById(R.id.textView3);
    // TextView textView4 = (TextView)findViewById(R.id.textView4);
}