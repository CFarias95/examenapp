package com.example.examen;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.TableLayout;
import android.widget.TextView;

import java.util.ArrayList;

public class Interfaz extends AppCompatActivity {
    TextView tvusuario,tvrol;
    private TableLayout tableLayout;
    private String[]header={"Materia","Nota1","Nota2","Nota3","Ref"};
    private ArrayList<String[]>rows = new ArrayList<>();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_interfaz);

        tvusuario = findViewById(R.id.textviewnombre);
        tvrol = findViewById(R.id.textviewrol);

        Intent intent = getIntent();
        String rol = intent.getStringExtra("rol");
        String usuario =intent.getStringExtra("user");

        tvrol.setText(rol);
        tvusuario.setText(usuario);




    }


}
