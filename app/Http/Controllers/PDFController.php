<?php

namespace App\Http\Controllers;

use App\Facades\CourseFacade;
use App\Facades\DashboardFacade;
use App\Facades\PackageDefinitionFacade;
use App\Models\Package;
use App\Models\PackageDefinition;
use App\ViewModels\StudentPackageViewModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function businessPdf()
    {
        list($studentsData, $studentWithPackagesEndingCurrentMonth, $studentWithPackagesEndingSoon, $packageDefinitionStats, $courseStats) = $this->getData();

        $data = [
            'studentsData' => $studentsData,
            'studentWithPackagesEndingCurrentMonth' => $studentWithPackagesEndingCurrentMonth,
            'studentWithPackagesEndingSoon' => $studentWithPackagesEndingSoon,
            'packageDefinitionStats' => $packageDefinitionStats,
            'courseStats' => $courseStats
        ];

        $pdf = Pdf::loadView('pdfs/business-info', $data);

        return $pdf->download('sample.pdf');
    }

    public function testPdfView()
    {

        list($studentsData, $studentWithPackagesEndingCurrentMonth, $studentWithPackagesEndingSoon, $packageDefinitionStats, $courseStats) = $this->getData();

        $data = [
            'title' => 'Sample PDF',
            'content' => 'This is the content of the PDF file.',
            'studentsData' => $studentsData,
            'studentWithPackagesEndingCurrentMonth' => $studentWithPackagesEndingCurrentMonth,
            'studentWithPackagesEndingSoon' => $studentWithPackagesEndingSoon,
            'packageDefinitionStats' => $packageDefinitionStats,
            'courseStats' => $courseStats
        ];

        return view('pdfs/business-info', $data);
    }

    /**
     * @return array
     */
    private function getData(): array
    {
        $dashBoardFacade = new DashboardFacade();

        $studentsData = $dashBoardFacade->getStudentsStats();
        $studentWithPackagesEndingCurrentMonth = $dashBoardFacade->getStudentsWithPackagesEndingCurrentMonth();
        $studentWithPackagesEndingSoon = $dashBoardFacade->getStudentsWithPackagesEndingSoon();

        $packageDefinitionFacade = new PackageDefinitionFacade();
        $packageDefinitionStats = $packageDefinitionFacade->getPackageDefinitionStats();


        $courseFacade = new CourseFacade();
        $courseStats = $courseFacade->getAttendancePerCourse();
        return array($studentsData, $studentWithPackagesEndingCurrentMonth, $studentWithPackagesEndingSoon, $packageDefinitionStats, $courseStats);
    }
}
