package com.example.ubud_souvenir_center

import android.content.ClipData
import android.content.ClipboardManager
import android.content.Context
import android.content.Intent
import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Toast
import androidx.core.os.bundleOf
import androidx.fragment.app.Fragment
import com.example.ubud_souvenir_center.databinding.ActivityFragmentHasilBinding


class FragmentHasil : Fragment() {

    private var _binding : ActivityFragmentHasilBinding? = null
    private val binding get() = _binding!!

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View {

        _binding = ActivityFragmentHasilBinding.inflate(inflater, container, false)

        val qrResult = arguments?.getString(QR_RESULT)
        binding.qrContent.text = qrResult

        binding.openButton.setOnClickListener {
            val intent = Intent(activity, HasilScan::class.java)
            intent.putExtra("hasil", qrResult)
            startActivity(intent)
        }

        binding.copyButton.setOnClickListener {
            val clipboard = requireContext().getSystemService(Context.CLIPBOARD_SERVICE) as ClipboardManager
            val clip: ClipData = ClipData.newPlainText("QR Result", qrResult)
            clipboard.setPrimaryClip(clip)
            Toast.makeText(activity, "Copy to Clipboard Successful", Toast.LENGTH_SHORT).show()
        }
        binding.shareButton.setOnClickListener {
            val sendIntent: Intent = Intent().apply {
                action = Intent.ACTION_SEND
                putExtra(Intent.EXTRA_TEXT, qrResult)
                type = "text/plain"
            }

            val shareIntent = Intent.createChooser(sendIntent, null)
            startActivity(shareIntent)

        }
        binding.scanAgainButton.setOnClickListener {
            requireActivity().onBackPressed()
        }

        return binding.root
    }

    companion object {
        private const val QR_RESULT = "qr_result"
        const val RESULT_FRAGMENT_TAG = "Result Fragment TAG"

        fun create(qrResult: String): FragmentHasil {
            val fragment = FragmentHasil()
            val args = bundleOf(
                QR_RESULT to qrResult
            )
            fragment.arguments = args
            return fragment
        }
    }
    override fun onDestroyView() {
        super.onDestroyView()
        _binding = null
    }
}