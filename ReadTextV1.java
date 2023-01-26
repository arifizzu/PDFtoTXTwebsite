import java.io.File;
import java.io.IOException;
import java.io.FileWriter;   // Import the FileWriter class

import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.text.PDFTextStripper;
public class ReadTextV1 {

    public static void main(String args[]) throws IOException {
        //Take parameter
        String fileName = args[0];

        //Loading an existing document
        File file = new File("uploadedFile/" + fileName);
        PDDocument document = PDDocument.load(file);
        //Instantiate PDFTextStripper class
        PDFTextStripper pdfStripper = new PDFTextStripper();
        //Retrieving text from PDF document
        String text = pdfStripper.getText(document);

        try {
            //location to put the converted file
            FileWriter myWriter = new FileWriter("convertedFile/" + fileName.substring(0, fileName.length()-4) + "_Converted.txt");
            myWriter.write(text);
            myWriter.close();
        } catch (IOException e) {
        }

        //Closing the document
        document.close();

    }
}